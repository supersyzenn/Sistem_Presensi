<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil 3 tahun angkatan terakhir
        $tahunAngkatan = Siswa::select('tahun_angkatan')
        ->distinct()
            ->orderBy('tahun_angkatan', 'asc')
            ->take(3)
            ->pluck('tahun_angkatan');

        // Menyiapkan data series untuk grafik
        $series = [
            [
                'name' => 'Kelas X',
                'data' => [],
                'color' => '#1A56DB',
            ],
            [
                'name' => 'Kelas XI',
                'data' => [],
                'color' => '#7E3AF2',
            ],
            [
                'name' => 'Kelas XII',
                'data' => [],
                'color' => '#046B70',
            ]
        ];

        // Mengisi data untuk setiap tahun angkatan
        foreach ($tahunAngkatan as $tahun) {
            // Kelas X (id: 1)
            $kelasX = Siswa::where('kelas_id', 1)
            ->where('tahun_angkatan', $tahun)
                ->count();

            // Kelas XI (id: 2)
            $kelasXI = Siswa::where('kelas_id', 2)
            ->where('tahun_angkatan', $tahun)
                ->count();

            // Kelas XII (id: 3)
            $kelasXII = Siswa::where('kelas_id', 3)
            ->where('tahun_angkatan', $tahun)
                ->count();

            $series[0]['data'][] = $kelasXII;
            $series[1]['data'][] = $kelasXI;
            $series[2]['data'][] = $kelasX;
        }

        // Persiapkan categories untuk sumbu X (dibalik agar urutan dari kiri ke kanan)
        $categories = $tahunAngkatan->reverse()->values()->toArray();
        $categories = array_reverse($categories);

        return view('admin.dashboard', [
            'categories' => $categories,
            'series' => $series,
            'totalSiswa' => Siswa::count()
        ]);
    }
}
