<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\TahunAjaran;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['guru.user', 'mapel', 'kelas', 'tahunAjaran'])->paginate(7);
        $gurus = Guru::with('user')->get();
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        $tahunAjarans = TahunAjaran::all();

        return view('admin.jadwal.index', compact(
            'jadwals',
            'gurus',
            'mapels',
            'kelas',
            'tahunAjarans'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'mapel_id' => 'required|exists:mapel,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam' => 'required|string',
            'jam_ke' => 'required|integer|min:1|max:10'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'mapel_id' => 'required|exists:mapel,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam' => 'required|string',
            'jam_ke' => 'required|integer|min:1|max:10'
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
