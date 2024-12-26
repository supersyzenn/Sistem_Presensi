<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->paginate(7);
        $users = User::where('role', 'user')->get();
        return view('admin.guru.index', compact('guru', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nip' => 'required|string|unique:guru',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/guru'), $fotoName);
            $data['foto'] = $fotoName;
        }

        Guru::create($data);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nip' => 'required|string|unique:guru,nip,' . $id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                $oldPhotoPath = public_path('img/guru/' . $guru->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/guru'), $fotoName);
            $data['foto'] = $fotoName;
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto) {
            $photoPath = public_path('img/guru/' . $guru->foto);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}
