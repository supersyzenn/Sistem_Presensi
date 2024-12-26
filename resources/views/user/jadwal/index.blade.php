<x-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Data Jadwal Mengajar {{ Auth::user()->name }}
        </h2>
        <!-- Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-6 py-3">Kode</th>
                            <th class="px-6 py-3">Mata Pelajaran</th>
                            <th class="px-6 py-3">Kelas</th>
                            <th class="px-6 py-3">Hari</th>
                            <th class="px-6 py-3">Jam</th>
                            <th class="px-6 py-3">Jam ke</th>
                            <th class="px-6 py-3">Tahun Ajaran</th>
                            <th class="px-6 py-3">Semester</th>
                            <th class="px-6 py-3">Presensi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($jadwals as $jadwal)
                            <tr class="text-gray-700">
                                <td class="px-6 py-4">{{ $jadwal->mapel->kode_mapel }}</td>
                                <td class="px-6 py-4">{{ $jadwal->mapel->nama_mapel }}</td>
                                <td class="px-6 py-4">{{ $jadwal->kelas->nama_kelas }}</td>
                                <td class="px-6 py-4">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4">{{ $jadwal->jam }}</td>
                                <td class="px-6 py-4">{{ $jadwal->jam_ke }}</td>
                                <td class="px-6 py-4">{{ $jadwal->tahunAjaran->tahun_ajar }}</td>
                                <td class="px-6 py-4">{{ $jadwal->semester }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('user.presensi', ['jadwal' => $jadwal->id]) }}"
                                        class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                        Presensi
                                    </a>
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
</x-layout>
