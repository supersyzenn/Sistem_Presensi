<!-- resources/views/admin/pengguna/index.blade.php -->
<x-layoutadmin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Data Pengguna
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.pengguna.create') }}"
                    class="px-6 py-2.5 text-sm font-medium text-white
               bg-gradient-to-r from-teal-600 to-teal-500 rounded-xl hover:from-teal-700 hover:to-teal-600
               transform transition-all duration-200 ease-in-out hover:scale-95">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Pengguna
                    </span>
                </a>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Foto</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Username</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Role</th>
                            <th class="px-4 py-3">NUPTK</th>
                            <th class="px-4 py-3">Jenis Kelamin</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($users as $user)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3">
                                    @if ($user->role === 'admin')
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ $user->adminDetail && $user->adminDetail->foto ? asset('img/profile/' . $user->adminDetail->foto) : asset('img/default.jpg') }}"
                                            alt="Profile photo">
                                    @else
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ $user->guruDetail && $user->guruDetail->foto ? asset('img/profile/' . $user->guruDetail->foto) : asset('img/default.jpg') }}"
                                            alt="Profile photo">
                                    @endif
                                    {{-- </td>
                                <td class="px-4 py-3">{{ $user->name }}</td>
                                <td class="px-4 py-3">{{ $user->username }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">{{ ucfirst($user->role) }}</td>
                                <td class="px-4 py-3">{{ $user->role === 'user' ? $user->guruDetail->nip : '-' }}</td>
                                <td class="px-4 py-3">
                                    @if ($user->role === 'admin')
                                        {{ $user->adminDetail ? $user->adminDetail->jenis_kelamin : '-' }}
                                    @else
                                        {{ $user->guruDetail ? $user->guruDetail->jenis_kelamin : '-' }}
                                    @endif
                                </td> --}}
                                <td class="px-4 py-3">{{ $user->name }}</td>
                                <td class="px-4 py-3">{{ $user->username }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">{{ ucfirst($user->role) }}</td>
                                <td class="px-4 py-3">
                                    {{ $user->role === 'user' && $user->guruDetail ? $user->guruDetail->nip : '-' }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($user->role === 'admin')
                                        {{ optional($user->adminDetail)->jenis_kelamin ?? '-' }}
                                    @else
                                        {{ optional($user->guruDetail)->jenis_kelamin ?? '-' }}
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('admin.pengguna.edit', $user->id) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-teal-600 rounded-lg focus:outline-none focus:shadow-outline-gray">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <button type="button"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray delete-btn"
                                            data-id="{{ $user->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 py-3 border-t">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Event listener untuk tombol delete
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.dataset.id;

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Ingin menghapus pengguna ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${userId}`).submit();
                    }
                });
            });
        });

        // SweetAlert untuk notifikasi setelah delete
        @if (session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 1500,
                showConfirmButton: false
            });
        @endif
    </script>
</x-layoutadmin>
