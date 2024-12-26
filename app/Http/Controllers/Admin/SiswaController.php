<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->paginate(7);
        $kelas = Kelas::all();
        return view('admin.siswa.index', compact('siswas', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nis' => 'required|string|unique:siswa',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_angkatan' => 'required|date_format:Y',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/siswa'), $fotoName);
            $data['foto'] = $fotoName; // Tambahkan nama foto ke data
        }

        Siswa::create($data);

        return redirect()->route('admin.siswa.index')
        ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nis' => 'required|string|unique:siswa,nis,' . $id,
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_angkatan' => 'required|date_format:Y',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        // Handle foto upload jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();

            $oldPhotoPath = public_path('img/siswa/' . $siswa->foto);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
            // Simpan foto baru
            $foto->move(public_path('img/siswa'), $fotoName);
            $data['foto'] = $fotoName;
        }


        $siswa->update($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus foto jika ada
        if ($siswa->foto) {
            Storage::delete('public/siswa/' . $siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}
