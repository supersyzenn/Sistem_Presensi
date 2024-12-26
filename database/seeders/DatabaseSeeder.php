<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAdmin;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Tendik;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users - Admin
        $adminUsers = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'Admin Kedua',
                'username' => 'admin2',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        ];

        foreach ($adminUsers as $admin) {
            User::create($admin);
        }

        // Users - Guru
        $guruUsers = [
            [
                'name' => 'Ahmad Junaedi',
                'username' => 'junaedi',
                'email' => 'junaedi@example.com',
                'password' => Hash::make('password'),
                'role' => 'user'
            ],
            [
                'name' => 'Siti Aminah',
                'username' => 'aminah',
                'email' => 'aminah@example.com',
                'password' => Hash::make('password'),
                'role' => 'user'
            ],
            [
                'name' => 'Budi Santoso',
                'username' => 'budi',
                'email' => 'budi@example.com',
                'password' => Hash::make('password'),
                'role' => 'user'
            ]
        ];

        foreach ($guruUsers as $guru) {
            User::create($guru);
        }

        // User Admin
        $userAdmins = [
            [
                'user_id' => 1,
                'jenis_kelamin' => 'Laki-laki',
                'jabatan' => 'Admin'
            ],
            [
                'user_id' => 2,
                'jenis_kelamin' => 'Perempuan',
                'jabatan' => 'Admin'
            ]
        ];

        foreach ($userAdmins as $userAdmin) {
            UserAdmin::create($userAdmin);
        }

        // Guru
        $gurus = [
            [
                'user_id' => 3,
                'nip' => '198501152010011001',
                'jenis_kelamin' => 'Laki-laki'
            ],
            [
                'user_id' => 4,
                'nip' => '198703222011012002',
                'jenis_kelamin' => 'Perempuan'
            ],
            [
                'user_id' => 5,
                'nip' => '199001012012011003',
                'jenis_kelamin' => 'Laki-laki'
            ]
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }

        // Kelas
        $kelas = [
            ['nama_kelas' => 'X'],
            ['nama_kelas' => 'XI'],
            ['nama_kelas' => 'XII']
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }

        // Semester
        $semesters = [
            ['semester' => 'Genap'],
            ['semester' => 'Ganjil']
        ];

        foreach ($semesters as $semester) {
            Semester::create($semester);
        }

        // Tahun Ajaran
        $tahunAjarans = [
            ['tahun_ajar' => '2023/2024']
        ];

        foreach ($tahunAjarans as $tahunAjaran) {
            TahunAjaran::create($tahunAjaran);
        }

        // Mata Pelajaran
        $mapels = [
            [
                'kode_mapel' => 'MTK',
                'nama_mapel' => 'Matematika'
            ],
            [
                'kode_mapel' => 'BIN',
                'nama_mapel' => 'Bahasa Indonesia'
            ],
            [
                'kode_mapel' => 'BIG',
                'nama_mapel' => 'Bahasa Inggris'
            ],
            [
                'kode_mapel' => 'IPA',
                'nama_mapel' => 'Ilmu Pengetahuan Alam'
            ],
            [
                'kode_mapel' => 'IPS',
                'nama_mapel' => 'Ilmu Pengetahuan Sosial'
            ],
            [
                'kode_mapel' => 'PKN',
                'nama_mapel' => 'Pendidikan Kewarganegaraan'
            ],
            [
                'kode_mapel' => 'PAI',
                'nama_mapel' => 'Pendidikan Agama Islam'
            ],
            [
                'kode_mapel' => 'PJOK',
                'nama_mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan'
            ],
            [
                'kode_mapel' => 'SBK',
                'nama_mapel' => 'Seni Budaya dan Keterampilan'
            ],
            [
                'kode_mapel' => 'TIK',
                'nama_mapel' => 'Teknologi Informasi dan Komunikasi'
            ]
        ];

        foreach ($mapels as $mapel) {
            Mapel::create($mapel);
        }

        // Siswa
        $siswas = [
                // Kelas X
                [
                    'kelas_id' => 1,
                    'nis' => '2022001',
                    'nama_siswa' => 'Syahrul Anwar',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2022'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2022002',
                    'nama_siswa' => 'Indah Permata',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2022'
                ],

                // Kelas XI
                [
                    'kelas_id' => 2,
                    'nis' => '2022003',
                    'nama_siswa' => 'Dwi Saputra',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2022'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2022004',
                    'nama_siswa' => 'Putri Anggraini',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2022'
                ],

                // Kelas XII
                [
                    'kelas_id' => 3,
                    'nis' => '2022005',
                    'nama_siswa' => 'Rahmat Hidayat',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2022'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2022006',
                    'nama_siswa' => 'Sri Hartini',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2022'
                ],
                // Kelas X
                [
                    'kelas_id' => 1,
                    'nis' => '2023001',
                    'nama_siswa' => 'Ali Hasan',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2023'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2023002',
                    'nama_siswa' => 'Aisyah Putri',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2023'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2023003',
                    'nama_siswa' => 'Fajar Ramadhan',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2023'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2023004',
                    'nama_siswa' => 'Reni Kusuma',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2023'
                ],

                // Kelas XI
                [
                    'kelas_id' => 2,
                    'nis' => '2023005',
                    'nama_siswa' => 'Bagus Pratama',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2023'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2023006',
                    'nama_siswa' => 'Rina Amalia',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2023'
                ],

                // Kelas XII
                [
                    'kelas_id' => 3,
                    'nis' => '2023007',
                    'nama_siswa' => 'Zaki Maulana',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2023'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2023008',
                    'nama_siswa' => 'Lestari Dewi',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2023'
                ],

                // Kelas X
                [
                    'kelas_id' => 1,
                    'nis' => '2024001',
                    'nama_siswa' => 'Ahmad Rizki',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024002',
                    'nama_siswa' => 'Siti Nur Aini',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024003',
                    'nama_siswa' => 'Rudi Hermawan',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024004',
                    'nama_siswa' => 'Nina Marlina',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024005',
                    'nama_siswa' => 'Dodi Pratama',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024006',
                    'nama_siswa' => 'Rina Wati',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024007',
                    'nama_siswa' => 'Farhan Abdul',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 1,
                    'nis' => '2024008',
                    'nama_siswa' => 'Maya Sari',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],

                // Kelas XI
                [
                    'kelas_id' => 2,
                    'nis' => '2024009',
                    'nama_siswa' => 'Muhammad Fariz',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024010',
                    'nama_siswa' => 'Dewi Sartika',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024011',
                    'nama_siswa' => 'Rizal Ibrahim',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024012',
                    'nama_siswa' => 'Putri Andini',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024013',
                    'nama_siswa' => 'Dimas Prakoso',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024014',
                    'nama_siswa' => 'Anisa Rahma',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024015',
                    'nama_siswa' => 'Yoga Pratama',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 2,
                    'nis' => '2024016',
                    'nama_siswa' => 'Dina Fitria',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],

                // Kelas XII
                [
                    'kelas_id' => 3,
                    'nis' => '2024017',
                    'nama_siswa' => 'Budi Santoso',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024018',
                    'nama_siswa' => 'Linda Permata',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024019',
                    'nama_siswa' => 'Irfan Hakim',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024020',
                    'nama_siswa' => 'Siska Dewi',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024021',
                    'nama_siswa' => 'Adi Nugroho',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024022',
                    'nama_siswa' => 'Rika Susanti',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024023',
                    'nama_siswa' => 'Fadli Rahman',
                    'jenis_kelamin' => 'Laki-laki',
                    'tahun_angkatan' => '2024'
                ],
                [
                    'kelas_id' => 3,
                    'nis' => '2024024',
                    'nama_siswa' => 'Nadia Putri',
                    'jenis_kelamin' => 'Perempuan',
                    'tahun_angkatan' => '2024'
                ]
            ];

        foreach ($siswas as $siswa) {
            Siswa::create($siswa);
        }

        // Jadwal
        $jadwals = [
            // Jadwal Kelas X
            [
                'guru_id' => 1,
                'mapel_id' => 1, // Matematika
                'kelas_id' => 1,
                'tahun_ajaran_id' => 1,
                'hari' => 'Senin',
                'jam' => '07:00-07:45',
                'jam_ke' => 1
            ],
            [
                'guru_id' => 1,
                'mapel_id' => 1, // Matematika
                'kelas_id' => 1,
                'tahun_ajaran_id' => 1,
                'hari' => 'Senin',
                'jam' => '07:45-08:30',
                'jam_ke' => 2
            ],
            [
                'guru_id' => 2,
                'mapel_id' => 2, // Bahasa Indonesia
                'kelas_id' => 1,
                'tahun_ajaran_id' => 1,
                'hari' => 'Senin',
                'jam' => '08:30-09:15',
                'jam_ke' => 3
            ],
            [
                'guru_id' => 2,
                'mapel_id' => 2, // Bahasa Indonesia
                'kelas_id' => 1,
                'tahun_ajaran_id' => 1,
                'hari' => 'Senin',
                'jam' => '09:15-10:00',
                'jam_ke' => 4
            ],
            [
                'guru_id' => 3,
                'mapel_id' => 3, // Bahasa Inggris
                'kelas_id' => 1,
                'tahun_ajaran_id' => 1,
                'hari' => 'Selasa',
                'jam' => '07:00-07:45',
                'jam_ke' => 1
            ],
            [
                'guru_id' => 3,
                'mapel_id' => 3, // Bahasa Inggris
                'kelas_id' => 1,
                'tahun_ajaran_id' => 1,
                'hari' => 'Selasa',
                'jam' => '07:45-08:30',
                'jam_ke' => 2
            ],

            // Jadwal Kelas XI
            [
                'guru_id' => 1,
                'mapel_id' => 1, // Matematika
                'kelas_id' => 2,
                'tahun_ajaran_id' => 1,
                'hari' => 'Rabu',
                'jam' => '07:00-07:45',
                'jam_ke' => 1
            ],
            [
                'guru_id' => 1,
                'mapel_id' => 1, // Matematika
                'kelas_id' => 2,
                'tahun_ajaran_id' => 1,
                'hari' => 'Rabu',
                'jam' => '07:45-08:30',
                'jam_ke' => 2
            ],
            [
                'guru_id' => 2,
                'mapel_id' => 2, // Bahasa Indonesia
                'kelas_id' => 2,
                'tahun_ajaran_id' => 1,
                'hari' => 'Kamis',
                'jam' => '07:00-07:45',
                'jam_ke' => 1
            ],
            [
                'guru_id' => 2,
                'mapel_id' => 2, // Bahasa Indonesia
                'kelas_id' => 2,
                'tahun_ajaran_id' => 1,
                'hari' => 'Kamis',
                'jam' => '07:45-08:30',
                'jam_ke' => 2
            ],

            // Jadwal Kelas XII
            [
                'guru_id' => 3,
                'mapel_id' => 1, // Matematika
                'kelas_id' => 3,
                'tahun_ajaran_id' => 1,
                'hari' => 'Jumat',
                'jam' => '07:00-07:45',
                'jam_ke' => 1
            ],
            [
                'guru_id' => 3,
                'mapel_id' => 1, // Matematika
                'kelas_id' => 3,
                'tahun_ajaran_id' => 1,
                'hari' => 'Jumat',
                'jam' => '07:45-08:30',
                'jam_ke' => 2
            ],
            [
                'guru_id' => 1,
                'mapel_id' => 2, // Bahasa Indonesia
                'kelas_id' => 3,
                'tahun_ajaran_id' => 1,
                'hari' => 'Sabtu',
                'jam' => '07:00-07:45',
                'jam_ke' => 1
            ],
            [
                'guru_id' => 1,
                'mapel_id' => 2, // Bahasa Indonesia
                'kelas_id' => 3,
                'tahun_ajaran_id' => 1,
                'hari' => 'Sabtu',
                'jam' => '07:45-08:30',
                'jam_ke' => 2
            ]
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }

        // Tendik (jika diperlukan)
        $tendiks = [
            [
                'nuptk' => '1234567890123456',
                'nama_tendik' => 'Ahmad Staff TU',
                'jenis_kelamin' => 'Laki-laki',
                'status_kepegawaian' => 'PNS'
            ],
            [
                'nuptk' => '6543210987654321',
                'nama_tendik' => 'Siti Staff Perpustakaan',
                'jenis_kelamin' => 'Perempuan',
                'status_kepegawaian' => 'Non-PNS'
            ]
        ];

        foreach ($tendiks as $tendik) {
            Tendik::create($tendik);
        }
    }
}
