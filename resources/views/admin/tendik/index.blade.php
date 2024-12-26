<x-layoutadmin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">Data Tendik</h2>

        <div class="flex justify-end mb-4">
            <button id="tambahTendikButton"
                class="px-6 py-2.5 text-sm font-medium text-white
               bg-gradient-to-r from-teal-600 to-teal-500 rounded-xl hover:from-teal-700 hover:to-teal-600
               transform transition-all duration-200 ease-in-out hover:scale-95
               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500
               shadow-lg shadow-teal-500/30">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Tendik
                </span>
            </button>
        </div>

        <!-- Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-6 py-3">NUPTK</th>
                            <th class="px-6 py-3">Nama Tendik</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Status Kepegawaian</th>
                            <th class="px-6 py-3">Foto</th>
                            <th class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($tendiks as $tendik)
                            <tr class="text-gray-700">
                                <td class="px-6 py-4">{{ $tendik->nuptk }}</td>
                                <td class="px-6 py-4">{{ $tendik->nama_tendik }}</td>
                                <td class="px-6 py-4">{{ $tendik->jenis_kelamin }}</td>
                                <td class="px-6 py-4">{{ $tendik->status_kepegawaian }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ $tendik->foto ? asset('img/tendik/' . $tendik->foto) : asset('img/tendik/default.jpg') }}"
                                        class="h-10 w-10 rounded-full object-cover">
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button class="editButton p-2 text-sm font-medium text-blue-600 rounded-lg hover:bg-blue-100"
                                        data-id="{{ $tendik->id }}" data-nuptk="{{ $tendik->nuptk }}" data-nama="{{ $tendik->nama_tendik }}"
                                        data-jk="{{ $tendik->jenis_kelamin }}" data-status="{{ $tendik->status_kepegawaian }}"
                                        data-foto="{{ $tendik->foto }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.tendik.destroy', $tendik->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteButton p-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    {{ $tendiks->links() }}
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div id="tambahTendikModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl transform transition-all border">
                <!-- Header -->
                <div class="px-8 py-6 bg-gradient-to-r from-teal-600 to-teal-500 rounded-t-2xl">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Tendik
                    </h2>
                </div>

                <!-- Body -->
                <form action="{{ route('admin.tendik.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-8 space-y-6">
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">NUPTK <span class="text-red-500">*</span></label>
                            <input type="text" name="nuptk" value="{{ old('nuptk') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Nama Tendik <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_tendik" value="{{ old('nama_tendik') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select name="jenis_kelamin"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Status Kepegawaian <span
                                    class="text-red-500">*</span></label>
                            <select name="status_kepegawaian"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                                <option value="">Pilih Status</option>
                                <option value="PNS" {{ old('status_kepegawaian') == 'PNS' ? 'selected' : '' }}>PNS</option>
                                <option value="Non-PNS" {{ old('status_kepegawaian') == 'Non-PNS' ? 'selected' : '' }}>Non-PNS</option>
                            </select>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Foto</label>
                            <div class="flex items-center space-x-4">
                                <div class="relative w-24 h-24 rounded-lg overflow-hidden bg-gray-100">
                                    <img id="previewFoto" src="{{ asset('img/tendik/default.jpg') }}" class="w-full h-full object-cover"
                                        alt="Preview Foto">
                                    <div id="loadingFoto" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                        <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="foto" id="inputFoto" accept="image/*"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl
                                        focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG (Maks. 2MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-8 py-6 bg-gray-50 rounded-b-2xl flex justify-end space-x-4 border-t border-gray-100">
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
        <div id="editTendikModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl transform transition-all border">
                <!-- Header -->
                <div class="px-8 py-6 bg-gradient-to-r from-teal-600 to-teal-500 rounded-t-2xl">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Tendik
                    </h2>
                </div>

                <!-- Body -->
                <form id="editTendikForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-8 space-y-6">
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">NUPTK <span class="text-red-500">*</span></label>
                            <input type="text" name="nuptk" id="edit_nuptk"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Nama Tendik <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_tendik" id="edit_nama_tendik"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select name="jenis_kelamin" id="edit_jenis_kelamin"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Status Kepegawaian <span
                                    class="text-red-500">*</span></label>
                            <select name="status_kepegawaian" id="edit_status_kepegawaian"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                required>
                                <option value="PNS">PNS</option>
                                <option value="Non-PNS">Non-PNS</option>
                            </select>
                        </div>

                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Foto</label>
                            <div class="flex items-center space-x-4">
                                <div class="relative w-24 h-24 rounded-lg overflow-hidden bg-gray-100">
                                    <img id="previewFoto" src="{{ asset('img/tendik/default.jpg') }}" class="w-full h-full object-cover"
                                        alt="Preview Foto">
                                    <div id="editLoadingFoto"
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                        <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="foto" id="editInputFoto" accept="image/*"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                    <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG (Maks. 2MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-8 py-6 bg-gray-50 rounded-b-2xl flex justify-end space-x-4 border-t border-gray-100">
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
            $('#tambahTendikButton').click(function() {
                $('#tambahTendikModal').removeClass('hidden');
            });

            $('.closeTambahModal').click(function() {
                $('#tambahTendikModal').addClass('hidden');
            });

            // Edit Modal
            $('.editButton').click(function() {
                const id = $(this).data('id');
                const nuptk = $(this).data('nuptk');
                const nama = $(this).data('nama');
                const jk = $(this).data('jk');
                const status = $(this).data('status');

                $('#editTendikForm').attr('action', `/admin/tendik/${id}`);
                $('#edit_nuptk').val(nuptk);
                $('#edit_nama_tendik').val(nama);
                $('#edit_jenis_kelamin').val(jk);
                $('#edit_status_kepegawaian').val(status);

                $('#editTendikModal').removeClass('hidden');
            });

            $('.closeEditModal').click(function() {
                $('#editTendikModal').addClass('hidden');
            });

            // Preview foto untuk form tambah
            $('#inputFoto').change(function(e) {
                const file = e.target.files[0];
                const preview = $('#previewFoto');
                const loading = $('#loadingFoto');

                if (file) {
                    // Validasi ukuran (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ukuran file terlalu besar',
                            text: 'Maksimal ukuran file adalah 2MB'
                        });
                        this.value = ''; // Reset input
                        preview.attr('src', '{{ asset('img/tendik/default.jpg') }}'); // Reset ke default image
                        return;
                    }

                    // Validasi tipe file
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Format file tidak sesuai',
                            text: 'Hanya file JPG, JPEG, dan PNG yang diperbolehkan'
                        });
                        this.value = ''; // Reset input
                        preview.attr('src', '{{ asset('img/tendik/default.jpg') }}'); // Reset ke default image
                        return;
                    }

                    loading.removeClass('hidden');

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result);
                        loading.addClass('hidden');
                    };
                    reader.onerror = function() {
                        loading.addClass('hidden');
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan saat membaca file'
                        });
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.attr('src', '{{ asset('img/tendik/default.jpg') }}');
                }
            });

            // Preview foto untuk form edit
            $('#editInputFoto').change(function(e) {
                const file = e.target.files[0];
                const preview = $('#editPreviewFoto');
                const loading = $('#editLoadingFoto');

                if (file) {
                    // Validasi ukuran (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ukuran file terlalu besar',
                            text: 'Maksimal ukuran file adalah 2MB'
                        });
                        this.value = ''; // Reset input
                        // Tidak reset preview karena mungkin ada foto existing
                        return;
                    }

                    // Validasi tipe file
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Format file tidak sesuai',
                            text: 'Hanya file JPG, JPEG, dan PNG yang diperbolehkan'
                        });
                        this.value = ''; // Reset input
                        // Tidak reset preview karena mungkin ada foto existing
                        return;
                    }

                    loading.removeClass('hidden');

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result);
                        loading.addClass('hidden');
                    };
                    reader.onerror = function() {
                        loading.addClass('hidden');
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan saat membaca file'
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Update bagian edit button untuk menampilkan foto existing
            $('.editButton').click(function() {
                const id = $(this).data('id');
                const nuptk = $(this).data('nuptk');
                const nama = $(this).data('nama');
                const jk = $(this).data('jk');
                const status = $(this).data('status');
                const foto = $(this).data('foto'); // Tambahkan data foto

                $('#editTendikForm').attr('action', `/admin/tendik/${id}`);
                $('#edit_nuptk').val(nuptk);
                $('#edit_nama_tendik').val(nama);
                $('#edit_jenis_kelamin').val(jk);
                $('#edit_status_kepegawaian').val(status);

                // Update preview foto
                if (foto) {
                    $('#editPreviewFoto').attr('src', `{{ asset('img/tendik/') }}/${foto}`);
                } else {
                    $('#editPreviewFoto').attr('src', '{{ asset('img/tendik/default.jpg') }}');
                }

                $('#editTendikModal').removeClass('hidden');
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
        });
    </script>
</x-layoutadmin>
