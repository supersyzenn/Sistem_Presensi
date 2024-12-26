<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\tendik;

class TendikController extends Controller
{
    public function index()
    {
        $tendiks = Tendik::paginate(7);
        return view('admin.tendik.index', compact('tendiks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nuptk' => 'required|unique:tendiks',
            'nama_tendik' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_kepegawaian' => 'required|in:PNS,Non-PNS',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nuptk.required' => 'NUPTK harus diisi',
            'nuptk.unique' => 'NUPTK sudah terdaftar',
            'nama_tendik.required' => 'Nama Tendik harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'status_kepegawaian.required' => 'Status Kepegawaian harus dipilih'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/tendik'), $fotoName);
            $data['foto'] = $fotoName;
        }

        Tendik::create($data);

        return redirect()->route('admin.tendik.index')
            ->with('success', 'Data tendik berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $tendik = Tendik::findOrFail($id);

        $request->validate([
            'nuptk' => 'required|unique:tendiks,nuptk,' . $tendik->id,
            'nama_tendik' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_kepegawaian' => 'required|in:PNS,Non-PNS',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nuptk.required' => 'NUPTK harus diisi',
            'nuptk.unique' => 'NUPTK sudah terdaftar',
            'nama_tendik.required' => 'Nama Tendik harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'status_kepegawaian.required' => 'Status Kepegawaian harus dipilih'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($tendik->foto) {
                $oldPhotoPath = public_path('img/tendik/' . $tendik->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/tendik'), $fotoName); // Ubah path ke folder tendik
            $data['foto'] = $fotoName;
        }

        $tendik->update($data);

        return redirect()->route('admin.tendik.index')
            ->with('success', 'Data tendik berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tendik = Tendik::findOrFail($id);

        if ($tendik->foto) {
            $fotoPath = public_path('img/tendik/' . $tendik->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $tendik->delete();

        return redirect()->route('admin.tendik.index')
            ->with('success', 'Data tendik berhasil dihapus');
    }
}
