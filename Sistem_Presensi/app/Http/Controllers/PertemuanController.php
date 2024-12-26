<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan; // Panggil model Pertemuan
use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    public function index()
    {
        // Ambil semua data pertemuan dari tabel
        $pertemuans = Pertemuan::all();

        // Kirimkan data ke file Blade di folder user/presensi.blade.php
        return view('user.presensi', compact('pertemuans'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'number' => 'required|integer|unique:pertemuans,number',
        ]);

        // Simpan data pertemuan baru
        Pertemuan::create(['number' => $request->number]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pertemuan berhasil ditambahkan.');
    }
}
