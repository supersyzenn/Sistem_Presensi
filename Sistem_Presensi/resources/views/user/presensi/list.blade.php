<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Daftar Presensi</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola data presensi kelas Anda</p>
            </div>
            {{-- <a href="{{ route('user.presensi') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Presensi
            </a> --}}
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Stats Overview -->
            <div class="grid grid-cols-3 gap-4 p-6 border-b border-gray-100">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h3 class="text-sm font-medium text-blue-600">Total Presensi</h3>
                    <p class="mt-2 text-3xl font-semibold text-blue-900">{{ $presensis->total() }}</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg">
                    <h3 class="text-sm font-medium text-green-600">Presensi Bulan Ini</h3>
                    <p class="mt-2 text-3xl font-semibold text-green-900">
                        {{ $presensis->where('created_at', '>=', now()->startOfMonth())->count() }}
                    </p>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg">
                    <h3 class="text-sm font-medium text-purple-600">Kelas Aktif</h3>
                    <p class="mt-2 text-3xl font-semibold text-purple-900">{{ $presensis->unique('kelas_id')->count() }}
                    </p>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto w-full">
                <table class="w-full min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mata Pelajaran
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pertemuan
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Materi</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($presensis as $presensi)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span
                                                class="text-blue-600 font-medium">{{ $presensi->tanggal->format('d') }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium">{{ $presensi->tanggal->format('d M Y') }}</div>
                                            <div class="text-gray-500">{{ $presensi->tanggal->format('l') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $presensi->jadwal->mapel->nama_mapel }}</div>
                                    <div class="text-sm text-gray-500">Jam ke-{{ $presensi->jadwal->jam_ke }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Kelas {{ $presensi->jadwal->kelas->nama_kelas }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium rounded-full {{ $presensi->pertemuan >= 15 ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        Pertemuan {{ $presensi->pertemuan }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ Str::limit($presensi->materi, 50) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $presensi->presensiDetails->count() }} Siswa
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('user.presensi.export-pdf', $presensi->id) }}"
                                            class="text-green-600 hover:text-green-900 bg-green-50 hover:bg-green-100 px-3 py-1 rounded-md transition-colors duration-200">
                                            PDF
                                        </a>
                                        <a href="{{ route('user.presensi.edit', $presensi->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded-md transition-colors duration-200">
                                            Edit
                                        </a>
                                        <button onclick="deletePresensi({{ $presensi->id }})"
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded-md transition-colors duration-200">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center py-8">
                                        <svg class="h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="text-gray-600 font-medium">Tidak ada data presensi</p>
                                        <p class="text-gray-400 text-sm mt-1">Silakan tambah data presensi baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($presensis->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $presensis->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        async function deletePresensi(id) {
            try {
                const result = await Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                });

                if (result.isConfirmed) {
                    const response = await fetch(`/user/presensi/${id}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Network response was not ok');
                    }

                    const data = await response.json();

                    if (data.status === 'success') {
                        await Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                        window.location.reload();
                    } else {
                        throw new Error(data.message || 'Gagal menghapus data');
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Gagal menghapus data: ' + error.message
                });
            }
        }
    </script>
</x-layout>
