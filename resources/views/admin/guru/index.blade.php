<x-layoutadmin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">Data Guru</h2>

        <div class="flex justify-end mb-4">
            <a href="#"
                class="tambahGuruButton px-6 py-2.5 text-sm font-medium text-white
                    bg-gradient-to-r from-teal-600 to-teal-500 rounded-xl hover:from-teal-700 hover:to-teal-600
                    transform transition-all duration-200 ease-in-out hover:scale-95">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Guru
                </span>
            </a>
        </div>

        <!-- Tabel -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-6 py-3">NUPTK</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Foto</th>
                            <th class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($guru as $g)
                            <tr class="text-gray-700">
                                <td class="px-6 py-4">{{ $g->nip }}</td>
                                <td class="px-6 py-4">{{ $g->user->name }}</td>
                                <td class="px-6 py-4">{{ $g->jenis_kelamin }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ $g->foto ? asset('img/guru/' . $g->foto) : asset('img/default.jpg') }}"
                                        class="h-10 w-10 rounded-full object-cover" />
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button class="editButton p-2 text-sm font-medium text-blue-600 rounded-lg hover:bg-blue-100"
                                        data-id="{{ $g->id }}" data-user="{{ $g->user_id }}" data-nip="{{ $g->nip }}"
                                        data-jk="{{ $g->jenis_kelamin }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    {{-- <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteButton p-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 py-3 border-t">
                    {{ $guru->links() }}
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editGuruModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl transform transition-all border">
                <div class="px-8 py-6 bg-gradient-to-r from-teal-600 to-teal-500 rounded-t-2xl">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Guru
                    </h2>
                </div>

                <form id="editGuruForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-8 space-y-6">
                        <!-- Pengguna -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Pilih Pengguna</label>
                            <select name="user_id" id="edit_user_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl" disabled>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- NIP -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">NIP</label>
                            <input type="text" name="nip" id="edit_nip" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="edit_jenis_kelamin"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="relative">
                            <label class="text-gray-700 text-sm font-semibold mb-2 block">Foto</label>
                            <input type="file" name="foto" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                        </div>
                    </div>

                    <div class="px-8 py-6 bg-gray-50 rounded-b-2xl flex justify-end space-x-4 border-t border-gray-100">
                        <button type="button"
                            class="closeEditModal px-6 py-2.5 text-sm font-medium text-gray-700
                                bg-white border-2 border-gray-200 rounded-xl hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white
                                bg-blue-600 hover:bg-blue-700 rounded-xl">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('.tambahGuruButton').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Informasi',
                    text: 'Untuk menambah data guru, silakan menuju ke menu Pengguna dan pilih role Guru',
                    icon: 'info',
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#10B981'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('admin.pengguna.index') }}";
                    }
                });
            });

            // Modal Edit
            $('.editButton').click(function() {
                const id = $(this).data('id');
                const userId = $(this).data('user');
                const nip = $(this).data('nip');
                const jk = $(this).data('jk');

                $('#editGuruForm').attr('action', `/admin/guru/${id}`);
                $('#edit_user_id').val(userId);
                $('#edit_nip').val(nip);
                $('#edit_jenis_kelamin').val(jk);

                $('#editGuruModal').removeClass('hidden');
            });

            $('.closeEditModal').click(function() {
                $('#editGuruModal').addClass('hidden');
            });

            // Konfirmasi Hapus
            // $('.deleteButton').click(function(e) {
            //     e.preventDefault();
            //     const form = $(this).closest('form');

            //     Swal.fire({
            //         title: 'Apakah Anda yakin?',
            //         text: "Data yang dihapus tidak dapat dikembalikan!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#d33',
            //         cancelButtonColor: '#3085d6',
            //         confirmButtonText: 'Ya, hapus!',
            //         cancelButtonText: 'Batal'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             form.submit();
            //         }
            //     });
            // });

            // Alert Sukses & Error
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
