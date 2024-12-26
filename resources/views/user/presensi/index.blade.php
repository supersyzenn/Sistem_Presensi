<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="container mx-auto mt-8 mb-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Kelas Mata Pelajaran</h1>

        <!-- Form Pilihan Mata Pelajaran -->
        <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
            <!-- Dropdown untuk Mata Pelajaran -->
            <label for="mataPelajaran" class="block text-gray-700 font-medium">Pilih Mata Pelajaran</label>
            <select id="mataPelajaran"
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">Pilih Jadwal Mengajar</option>
                @foreach ($jadwals as $jadwal)
                    <option value="{{ $jadwal->id }}">Kelas : {{ $jadwal->kelas->nama_kelas }}
                        || {{ $jadwal->mapel->kode_mapel }} - {{ $jadwal->mapel->nama_mapel }} || {{ $jadwal->hari }}
                        {{ $jadwal->jam }}</option>
                @endforeach
            </select>

            <!-- Detail Jadwal - Initially Hidden -->
            <div id="detailJadwal" class="mt-6 hidden">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Detail Jadwal</h2>
                <div class="grid grid-cols-2 gap-4 p-4 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium">Mata Pelajaran:</p>
                        <p id="detailMapel" class="text-gray-600"></p>
                    </div>
                    <div>
                        <p class="font-medium">Kelas:</p>
                        <p id="detailKelas" class="text-gray-600"></p>
                    </div>
                    <div>
                        <p class="font-medium">Hari:</p>
                        <p id="detailHari" class="text-gray-600"></p>
                    </div>
                    <div>
                        <p class="font-medium">Jam:</p>
                        <p id="detailJam" class="text-gray-600"></p>
                    </div>
                    <div>
                        <p class="font-medium">Jam Ke:</p>
                        <p id="detailJamKe" class="text-gray-600"></p>
                    </div>
                    <div>
                        <p class="font-medium">Tahun Ajaran:</p>
                        <p id="detailTahunAjaran" class="text-gray-600"></p>
                    </div>
                </div>

                @section('content')
                    <div class="container">
                        <h1 class="text-lg font-bold mb-4">Daftar Pertemuan</h1>

                        <!-- Tampilkan pesan sukses jika ada -->
                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Daftar Pertemuan -->
                        <ul class="list-disc pl-5 mb-4">
                            @forelse ($pertemuans ?? [] as $pertemuan)
                                <li>Pertemuan ke-{{ $pertemuan->number }}</li>
                            @empty
                                <li>Belum ada pertemuan yang ditambahkan.</li>
                            @endforelse
                        </ul>

                        <!-- Form Tambah Pertemuan -->
                        <form action="{{ route('pertemuan.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="number" class="block text-sm font-medium text-gray-700">
                                    Tambah Pertemuan Baru
                                </label>
                                <input type="number" name="number" id="number"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Tambahkan
                            </button>
                        </form>
                    </div>
                @endsection



                <!-- Materi Form -->
                <div class="mt-6">
                    <label for="materi" class="block text-gray-700 font-medium mb-2">Materi yang Disampaikan</label>
                    <textarea id="materi" rows="4"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                        placeholder="Tuliskan materi yang disampaikan..."></textarea>
                </div>

                <!-- Daftar Siswa -->
                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Siswa</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left">No</th>
                                    <th class="px-4 py-2 text-left">Nama</th>
                                    <th class="px-4 py-2 text-left">Kelamin</th>
                                    <th class="px-4 py-2 text-left">NIS</th>
                                    <th class="px-4 py-2 text-left">Kehadiran</th>
                                    <th class="px-4 py-2 text-left">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="daftarSiswa">
                                <!-- Data siswa akan di-render melalui JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    <button id="btnSimpanPresensi" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Simpan Presensi
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('mataPelajaran').addEventListener('change', async function() {
            const jadwalId = this.value;
            if (!jadwalId) {
                document.getElementById('detailJadwal').classList.add('hidden');
                return;
            }

            try {
                const response = await fetch(`/user/presensi/jadwal/${jadwalId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                // Update detail jadwal
                document.getElementById('detailMapel').textContent = data.jadwal.mapel.nama_mapel;
                document.getElementById('detailKelas').textContent = data.jadwal.kelas.nama_kelas;
                document.getElementById('detailHari').textContent = data.jadwal.hari;
                document.getElementById('detailJam').textContent = data.jadwal.jam;
                document.getElementById('detailJamKe').textContent = data.jadwal.jam_ke;
                document.getElementById('detailTahunAjaran').textContent = data.jadwal.tahun_ajaran.tahun_ajar;

                // Render daftar siswa
                const tbody = document.getElementById('daftarSiswa');
                tbody.innerHTML = '';

                data.siswa.forEach((siswa, index) => {
                    const row = `
                        <tr class="border-t" data-siswa-id="${siswa.id}">
                            <td class="px-4 py-2">${index + 1}</td>
                            <td class="px-4 py-2">${siswa.nama_siswa}</td>
                            <td class="px-4 py-2">${siswa.jenis_kelamin}</td>
                            <td class="px-4 py-2">${siswa.nis}</td>
                            <td class="px-4 py-2">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer kehadiran-checkbox" data-siswa-id="${siswa.id}" checked>
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600"></div>
                                </label>
                            </td>
                            <td class="px-4 py-2">
                                <input type="text" class="border rounded px-2 py-1 w-full keterangan-input" data-siswa-id="${siswa.id}" placeholder="Keterangan...">
                            </td>
                        </tr>
                    `;
                    tbody.insertAdjacentHTML('beforeend', row);
                });

                // Show detail section
                document.getElementById('detailJadwal').classList.remove('hidden');
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data');
            }
        });

        // Update save function
        document.getElementById('btnSimpanPresensi').addEventListener('click', async function() {
            const jadwalId = document.getElementById('mataPelajaran').value;
            const pertemuan = document.getElementById('pertemuan').value;
            const materi = document.getElementById('materi').value;
            const token = document.querySelector('input[name="_token"]').value;

            if (!jadwalId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Silahkan pilih jadwal terlebih dahulu'
                });
                return;
            }

            if (!materi) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Silahkan isi materi terlebih dahulu'
                });
                return;
            }

            try {
                // Show loading
                Swal.fire({
                    title: 'Menyimpan Data',
                    text: 'Mohon tunggu...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Kumpulkan data presensi siswa
                const presensiDetail = [];
                const checkboxes = document.querySelectorAll('.kehadiran-checkbox');
                const keteranganInputs = document.querySelectorAll('.keterangan-input');

                checkboxes.forEach((checkbox, index) => {
                    const siswaId = checkbox.dataset.siswaId;
                    const status = checkbox.checked ? 'hadir' : 'alpa';
                    const keterangan = keteranganInputs[index].value;

                    presensiDetail.push({
                        siswa_id: siswaId,
                        status: status,
                        keterangan: keterangan
                    });
                });

                const response = await fetch('/user/presensi/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        pertemuan: pertemuan,
                        jadwal_id: jadwalId,
                        materi: materi,
                        presensi_detail: presensiDetail
                    })
                });

                const data = await response.json();

                if (data.status === 'success') {
                    await Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data presensi berhasil disimpan',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    window.location.href = "{{ route('user.presensi.list') }}";
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Gagal menyimpan presensi: ' + error.message
                });
            }
        });
    </script>
</x-layout>
