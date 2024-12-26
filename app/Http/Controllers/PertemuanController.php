<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan; // Panggil model Pertemuan
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    public function showPresensiForm($jadwalId)
{
    $jadwal = Jadwal::with(['mapel', 'kelas'])->findOrFail($jadwalId);
    $pertemuans = Pertemuan::where('jadwal_id', $jadwalId)->get(); // Ambil daftar pertemuan berdasarkan jadwal

    return view('user.presensi.form', [
        'jadwal' => $jadwal,
        'jadwals' => Jadwal::all(), // Semua jadwal untuk dropdown
        'pertemuans' => $pertemuans, // Oper data pertemuan
    ]);
}


    public function index()
    {
        // Ambil semua data pertemuan dari tabel
        $pertemuans = Pertemuan::all();

        // Kirimkan data ke file Blade di folder user/presensi.blade.php
        return view('user.presensi', compact('pertemuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|integer|min:1',
            'jadwal_id' => 'required|exists:jadwals,id',
        ]);

        Pertemuan::create([
            'jadwal_id' => $request->jadwal_id,
            'number' => $request->number,
        ]);

        return redirect()->back()->with('success', 'Pertemuan berhasil ditambahkan.');
    }

}
