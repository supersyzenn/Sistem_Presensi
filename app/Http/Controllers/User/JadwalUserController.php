<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;


class JadwalUserController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::whereHas('guru.user', function ($query) {
            $query->where('name', Auth::user()->name);
        })
            ->with(['guru.user', 'mapel', 'kelas', 'tahunAjaran'])
        ->paginate(7);


        return view('user.jadwal.index', compact('jadwals'));
    }
}
