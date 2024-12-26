<x-layoutadmin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Data Jadwal Mengajar
        </h2>
        <div class="flex items-center justify-between mb-4 space-x-4">
            <!-- Tombol Tambah Jadwal -->
            <button id="tambahJadwalButton"
                class="px-6 py-3 text-sm font-medium text-white
                    bg-gradient-to-r from-teal-600 to-teal-500 rounded-lg hover:from-teal-700 hover:to-teal-600
                    transform transition-all duration-200 ease-in-out hover:scale-95
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500
                    shadow-md shadow-teal-500/30">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Jadwal
                </span>
            </button>

            <!-- Form Search -->
            <div class="flex flex-1 flex-col md:flex-row md:items-center">
                <label for="searchInput" class="mb-2 md:mb-0 md:mr-2 text-sm font-medium text-gray-700">Cari
                    Jadwal:</label>
                <div class="flex w-full space-x-2">
                    <input type="text" id="searchInput" placeholder="Contoh : Jupriadi / Nama Guru"
                        class="flex-1 px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" />
                    <button id="searchJadwalButton"
                        class="px-6 py-3 text-sm font-medium text-white
                            bg-gradient-to-r from-teal-600 to-teal-500 rounded-lg hover:from-teal-700 hover:to-teal-600
                            transform transition-all duration-200 ease-in-out hover:scale-95
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500
                            shadow-md shadow-teal-500/30">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4a7 7 0 1 1 0 14a7 7 0 0 1 0-14zm10 10l-3.5-3.5" />
                            </svg>
                            Search
                        </span>
                    </button>
                </div>
            </div>
        </div>


        <!-- Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-6 py-3">Guru</th>
                            <th class="px-6 py-3">Mata Pelajaran</th>
                            <th class="px-6 py-3">Kelas</th>
                            <th class="px-6 py-3">Hari</th>
                            <th class="px-6 py-3">Jam</th>
                            <th class="px-6 py-3">Jam ke</th>
                            <th class="px-6 py-3">Tahun Ajaran</th>
                            <th class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($jadwals as $jadwal)
                            <tr class="text-gray-700">
                                <td class="px-6 py-4">{{ $jadwal->guru->user->name }}</td>
                                <td class="px-6 py-4">{{ $jadwal->mapel->nama_mapel }}</td>
                                <td class="px-6 py-4">{{ $jadwal->kelas->nama_kelas }}</td>
                                <td class="px-6 py-4">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4">{{ $jadwal->jam }}</td>
                                <td class="px-6 py-4">{{ $jadwal->jam_ke }}</td>
                                <td class="px-6 py-4">{{ $jadwal->tahunAjaran->tahun_ajar }}</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button
                                        class="editButton p-2 text-sm font-medium text-blue-600 rounded-lg hover:bg-blue-100"
                                        data-id="{{ $jadwal->id }}" data-guru="{{ $jadwal->guru_id }}"
                                        data-mapel="{{ $jadwal->mapel_id }}" data-kelas="{{ $jadwal->kelas_id }}"
                                        data-hari="{{ $jadwal->hari }}" data-jam="{{ $jadwal->jam }}"
                                        data-jamke="{{ $jadwal->jam_ke }}"
                                        data-tahun="{{ $jadwal->tahun_ajaran_id }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="deleteButton p-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 py-3 border-t">
                    {{ $jadwals->links() }}
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div id="tambahJadwalModal"
            class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl transform transition-all border">
                <!-- Header dengan gradient -->
                <div class="px-8 py-6 bg-gradient-to-r from-teal-600 to-teal-500 rounded-t-2xl">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Jadwal
                    </h2>
                </div>

                <!-- Body -->
                <form action="{{ route('admin.jadwal.store') }}" method="POST">
                    @csrf
                    <div class="p-8 space-y-6">
                        <!-- Guru -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Guru</label>
                            <select name="guru_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Guru</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mata Pelajaran -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Mata Pelajaran</label>
                            <select name="mapel_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kelas -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Kelas</label>
                            <select name="kelas_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hari dan Jam -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Hari -->
                            <div class="relative">
                                <label class="text-gray-700 text-sm font-semibold mb-2 block">Hari</label>
                                <select name="hari"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                        focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>

                            <!-- Jam -->
                            <div class="relative">
                                <label class="text-gray-700 text-sm font-semibold mb-2 block">Jam</label>
                                <select name="jam"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                        focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <option value="">Pilih Jam</option>
                                    <option value="07:00-07:45">07:00-07:45</option>
                                    <option value="07:45-08:30">07:45-08:30</option>
                                    <option value="08:30-09:15">08:30-09:15</option>
                                    <option value="09:15-10:00">09:15-10:00</option>
                                    <option value="10:15-11:00">10:15-11:00</option>
                                    <option value="11:00-11:45">11:00-11:45</option>
                                    <option value="11:45-12:30">11:45-12:30</option>
                                    <option value="13:00-13:45">13:00-13:45</option>
                                    <option value="13:45-14:30">13:45-14:30</option>
                                    <option value="14:30-15:15">14:30-15:15</option>
                                </select>
                            </div>
                        </div>

                        <!-- Jam ke -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Jam ke</label>
                            <input type="number" name="jam_ke"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                placeholder="Contoh: 1">
                        </div>

                        <!-- Tahun Ajaran -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Tahun Ajaran</label>
                            <select name="tahun_ajaran_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjarans as $ta)
                                    <option value="{{ $ta->id }}">{{ $ta->tahun_ajar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="px-8 py-6 bg-gray-50 rounded-b-2xl flex justify-end space-x-4 border-t border-gray-100">
                        <button type="button"
                            class="closeTambahModal px-6 py-2.5 text-sm font-medium text-gray-700
                                bg-white border-2 border-gray-200 rounded-xl hover:bg-gray-50
                                transform transition-all duration-200 ease-in-out hover:scale-95
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white
                                bg-blue-600 hover:bg-blue-700 rounded-xl
                                transform transition-all duration-200 ease-in-out hover:scale-95
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500
                                shadow-lg shadow-teal-500/30">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editJadwalModal"
            class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl transform transition-all border">
                <!-- Header -->
                <div class="px-8 py-6 bg-gradient-to-r from-teal-600 to-teal-500 rounded-t-2xl">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Jadwal
                    </h2>
                </div>

                <!-- Body -->
                <form id="editJadwalForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-8 space-y-6">
                        <!-- Guru -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Guru</label>
                            <select name="guru_id" id="edit_guru_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Guru</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mata Pelajaran -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Mata Pelajaran</label>
                            <select name="mapel_id" id="edit_mapel_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kelas -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Kelas</label>
                            <select name="kelas_id" id="edit_kelas_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hari dan Jam -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Hari -->
                            <div class="relative">
                                <label class="text-gray-700 text-sm font-semibold mb-2 block">Hari</label>
                                <select name="hari" id="edit_hari"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                        focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>

                            <!-- Jam -->
                            <div class="relative">
                                <label class="text-gray-700 text-sm font-semibold mb-2 block">Jam</label>
                                <select name="jam" id="edit_jam"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                        focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <option value="">Pilih Jam</option>
                                    <option value="07:00-07:45">07:00-07:45</option>
                                    <option value="07:45-08:30">07:45-08:30</option>
                                    <option value="08:30-09:15">08:30-09:15</option>
                                    <option value="09:15-10:00">09:15-10:00</option>
                                    <option value="10:15-11:00">10:15-11:00</option>
                                    <option value="11:00-11:45">11:00-11:45</option>
                                    <option value="11:45-12:30">11:45-12:30</option>
                                    <option value="13:00-13:45">13:00-13:45</option>
                                    <option value="13:45-14:30">13:45-14:30</option>
                                    <option value="14:30-15:15">14:30-15:15</option>
                                </select>
                            </div>
                        </div>

                        <!-- Jam ke -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Jam ke</label>
                            <input type="number" name="jam_ke" id="edit_jam_ke"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                placeholder="Contoh: 1">
                        </div>

                        <!-- Tahun Ajaran -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Tahun Ajaran</label>
                            <select name="tahun_ajaran_id" id="edit_tahun_ajaran_id"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjarans as $ta)
                                    <option value="{{ $ta->id }}">{{ $ta->tahun_ajar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="px-8 py-6 bg-gray-50 rounded-b-2xl flex justify-end space-x-4 border-t border-gray-100">
                        <button type="button"
                            class="closeEditModal px-6 py-2.5 text-sm font-medium text-gray-700
                                bg-white border-2 border-gray-200 rounded-xl hover:bg-gray-50
                                transform transition-all duration-200 ease-in-out hover:scale-95
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white
                                bg-blue-600 hover:bg-blue-700 rounded-xl
                                transform transition-all duration-200 ease-in-out hover:scale-95
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500
                                shadow-lg shadow-teal-500/30">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Tambah Modal
            $('#tambahJadwalButton').click(function() {
                $('#tambahJadwalModal').removeClass('hidden');
            });

            $('.closeTambahModal').click(function() {
                $('#tambahJadwalModal').addClass('hidden');
            });

            // Edit Modal
            $('.editButton').click(function() {
                const id = $(this).data('id');
                const guruId = $(this).data('guru');
                const mapelId = $(this).data('mapel');
                const kelasId = $(this).data('kelas');
                const hari = $(this).data('hari');
                const jam = $(this).data('jam');
                const jamke = $(this).data('jamke');
                const tahunId = $(this).data('tahun');

                $('#editJadwalForm').attr('action', `/admin/jadwal/${id}`);
                $('#edit_guru_id').val(guruId);
                $('#edit_mapel_id').val(mapelId);
                $('#edit_kelas_id').val(kelasId);
                $('#edit_hari').val(hari);
                $('#edit_jam').val(jam);
                $('#edit_jam_ke').val(jamke);
                $('#edit_tahun_ajaran_id').val(tahunId);

                $('#editJadwalModal').removeClass('hidden');
            });

            $('.closeEditModal').click(function() {
                $('#editJadwalModal').addClass('hidden');
            });

            // Delete Confirmation
            $('.deleteButton').click(function(e) {
                e.preventDefault();
                const form = $(this).closest('form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Success & Error Alert
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 1500,
                    showConfirmButton: false
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan!',
                    html: '{!! implode('', $errors->all('<div>:message</div>')) !!}'
                });
            @endif

            // Close modal when clicking outside
            $(window).click(function(e) {
                if ($(e.target).hasClass('bg-black')) {
                    $('#tambahJadwalModal').addClass('hidden');
                    $('#editJadwalModal').addClass('hidden');
                }
            });
        });
    </script>
</x-layoutadmin>
