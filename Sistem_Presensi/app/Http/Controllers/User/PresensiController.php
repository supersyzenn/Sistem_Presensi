<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Presensi;
use App\Models\PresensiDetail;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PresensiController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::whereHas('guru.user', function ($query) {
            $query->where('name', Auth::user()->name);
        })
            ->with(['guru.user', 'mapel', 'kelas', 'tahunAjaran'])
            ->get();

        return view('user.presensi.index', [
            'title' => 'Presensi',
            'jadwals' => $jadwals
        ]);
    }

    public function getJadwalDetail($id)
    {
        try {
            $jadwal = Jadwal::with(['guru.user', 'mapel', 'kelas', 'tahunAjaran'])
                ->findOrFail($id);

            $siswa = Siswa::where('kelas_id', $jadwal->kelas_id)
                ->orderBy('nama_siswa', 'asc')
                ->get();

            return response()->json([
                'status' => 'success',
                'jadwal' => $jadwal,
                'siswa' => $siswa
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function storePresensi(Request $request)
    {
        try {
            $request->validate([
                'jadwal_id' => 'required|exists:jadwal,id',
                'pertemuan' => 'required|integer|min:1|max:20',
                'materi' => 'required|string',
                'presensi_detail' => 'required|array',
                'presensi_detail.*.siswa_id' => 'required|exists:siswa,id',
                'presensi_detail.*.status' => 'required|in:hadir,sakit,izin,alpa',
                'presensi_detail.*.keterangan' => 'nullable|string'
            ]);

            DB::beginTransaction();

            $presensi = Presensi::create([
                'jadwal_id' => $request->jadwal_id,
                'tanggal' => now(),
                'pertemuan' => $request->pertemuan,
                'materi' => $request->materi
            ]);

            foreach ($request->presensi_detail as $detail) {
                PresensiDetail::create([
                    'presensi_id' => $presensi->id,
                    'siswa_id' => $detail['siswa_id'],
                    'status' => $detail['status'],
                    'keterangan' => $detail['keterangan']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Data presensi berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function list()
    {
        $presensis = Presensi::with(['jadwal.guru.user', 'jadwal.mapel', 'jadwal.kelas'])
        ->whereHas('jadwal.guru.user', function ($query) {
            $query->where('id', Auth::user()->id);
        })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('user.presensi.list', [
            'title' => 'Daftar Presensi',
            'presensis' => $presensis
        ]);
    }

    public function edit($id)
    {
        $presensi = Presensi::with(['presensiDetails.siswa', 'jadwal.mapel', 'jadwal.kelas'])
        ->findOrFail($id);

        // Validasi hanya guru yang bersangkutan yang bisa edit
        if ($presensi->jadwal->guru->user_id !== Auth::user()->id) {
            abort(403);
        }

        return view('user.presensi.edit', [
            'title' => 'Edit Presensi',
            'presensi' => $presensi
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $presensi = Presensi::findOrFail($id);

            // Validasi kepemilikan data
            if ($presensi->jadwal->guru->user_id !== Auth::user()->id) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak memiliki akses untuk mengubah data ini'
                ], 403);
            }

            // Update data presensi
            $presensi->update([
                'pertemuan' => $request->pertemuan,
                'materi' => $request->materi
            ]);

            // Update detail presensi
            foreach ($request->presensi_detail as $detail) {
                PresensiDetail::where('id', $detail['id'])->update([
                    'status' => $detail['status'],
                    'keterangan' => $detail['keterangan']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Data presensi berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $presensi = Presensi::findOrFail($id);

            // Validasi apakah presensi milik guru yang sedang login
            if ($presensi->jadwal->guru->user_id !== Auth::user()->id) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak memiliki akses untuk menghapus data ini'
                ], 403);
            }

            // Hapus detail presensi terlebih dahulu
            $presensi->presensiDetails()->delete();

            // Hapus presensi
            $presensi->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data presensi berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data presensi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function exportPDF($id)
    {
        try {
            $presensi = Presensi::with([
                'presensiDetails.siswa',
                'jadwal.mapel',
                'jadwal.kelas',
                'jadwal.guru.user',
                'jadwal.tahunAjaran'
            ])->findOrFail($id);

            // Validate that only the assigned teacher can export
            if ($presensi->jadwal->guru->user_id !== Auth::user()->id) {
                abort(403, 'Unauthorized action.');
            }

            $pdf = PDF::loadView('user.presensi.pdf', ['presensi' => $presensi]);

            // Set paper to A4
            $pdf->setPaper('A4');

            return $pdf->download('presensi-' . $presensi->jadwal->kelas->nama_kelas . '-' . $presensi->tanggal->format('Y-m-d') . '.pdf');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengexport PDF: ' . $e->getMessage());
        }
    }
}
