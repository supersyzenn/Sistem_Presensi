<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::with(['adminDetail', 'guruDetail'])->paginate(7);
        return view('admin.pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|max:2048'
        ]);

        // Upload dan simpan foto jika ada
        $fotoName = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            // Simpan ke folder public/img/profile
            $foto->move(public_path('img/profile'), $fotoName);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        // Create detail berdasarkan role
        if ($request->role === 'admin') {
            UserAdmin::create([
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jabatan' => 'Admin',
                'foto' => $fotoName // Pastikan field 'foto' ada di fillable model UserAdmin
            ]);
        } else {
            Guru::create([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
                'foto' => $fotoName // Pastikan field 'foto' ada di fillable model Guru
            ]);
        }

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|max:2048'
        ]);

        // Update user data
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        // Handle foto upload jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();

            // Hapus foto lama
            if ($user->role === 'admin' && $user->adminDetail && $user->adminDetail->foto) {
                $oldPhotoPath = public_path('img/profile/' . $user->adminDetail->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            } elseif ($user->role === 'user' && $user->guruDetail && $user->guruDetail->foto) {
                $oldPhotoPath = public_path('img/profile/' . $user->guruDetail->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Simpan foto baru
            $foto->move(public_path('img/profile'), $fotoName);

            // Update foto di database
            if ($user->role === 'admin') {
                $user->adminDetail()->update(['foto' => $fotoName]);
            } else {
                $user->guruDetail()->update(['foto' => $fotoName]);
            }
        }

        // Update detail berdasarkan role
        if ($user->role === 'admin') {
            $user->adminDetail()->update([
                'jenis_kelamin' => $request->jenis_kelamin
            ]);
        } else {
            $user->guruDetail()->update([
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin
            ]);
        }

        // Update password jika ada
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed'
            ]);
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil diupdate!');
    }

    public function edit($id)
    {
        $user = User::with(['adminDetail', 'guruDetail'])->findOrFail($id);
        return view('admin.pengguna.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto jika ada
        if ($user->role === 'admin' && $user->adminDetail->foto) {
            Storage::delete('public/profile/' . $user->adminDetail->foto);
        } elseif ($user->role === 'user' && $user->guruDetail->foto) {
            Storage::delete('public/profile/' . $user->guruDetail->foto);
        }

        $user->delete();
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
