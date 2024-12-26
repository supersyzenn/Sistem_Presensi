 <x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <div class="container mx-auto px-4 py-8">
         <div class="max-w-4xl mx-auto">
             <!-- Header -->
             <div class="flex items-center justify-between mb-8">
                 <div>
                     <h1 class="text-2xl font-bold text-gray-900">Edit Presensi</h1>
                     <p class="mt-1 text-sm text-gray-600">Edit data presensi dan kehadiran siswa</p>
                 </div>
                 <button onclick="window.history.back()"
                     class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                     Kembali
                 </button>
             </div>

             <!-- Main Content -->
             <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                 <!-- Info Cards -->
                 <div class="grid grid-cols-3 gap-6 p-6 bg-gray-50 border-b border-gray-100">
                     <div>
                         <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider">Informasi Kelas</h3>
                         <div class="mt-2 bg-white p-4 rounded-lg border border-gray-200">
                             <div class="flex items-center">
                                 <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                     <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                     </svg>
                                 </div>
                                 <div class="ml-4">
                                     <p class="text-lg font-semibold text-gray-900">{{ $presensi->jadwal->kelas->nama_kelas }}</p>
                                     <p class="text-sm text-gray-500">{{ $presensi->jadwal->mapel->nama_mapel }}</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div>
                         <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider">Informasi Jadwal</h3>
                         <div class="mt-2 bg-white p-4 rounded-lg border border-gray-200">
                             <div class="flex items-center">
                                 <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                                     <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                     </svg>
                                 </div>
                                 <div class="ml-4">
                                     <p class="text-lg font-semibold text-gray-900">{{ $presensi->tanggal->format('l, d F Y') }}</p>
                                     <p class="text-sm text-gray-500">Jam ke-{{ $presensi->jadwal->jam_ke }}</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div>
                         <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider">Pertemuan</h3>
                         <div class="mt-2 bg-white p-4 rounded-lg border border-gray-200">
                             <select id="pertemuan"
                                 class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                 @for ($i = 1; $i <= 20; $i++)
                                     <option value="{{ $i }}" {{ $presensi->pertemuan == $i ? 'selected' : '' }}>
                                         Pertemuan {{ $i }}
                                     </option>
                                 @endfor
                             </select>
                         </div>
                     </div>
                 </div>

                 <!-- Form Content -->
                 <div class="p-6">
                     <div class="mb-6">
                         <label for="materi" class="block text-sm font-medium text-gray-700 mb-2">Materi Pembelajaran</label>
                         <textarea id="materi" rows="3"
                             class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-colors duration-200"
                             placeholder="Masukkan materi pembelajaran...">{{ $presensi->materi }}</textarea>
                     </div>

                     <div>
                         <h3 class="text-lg font-medium text-gray-900 mb-4">Data Kehadiran Siswa</h3>
                         <div class="overflow-x-auto border border-gray-200 rounded-lg">
                             <table class="min-w-full divide-y divide-gray-200">
                                 <thead class="bg-gray-50">
                                     <tr>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                                         </th>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Nama Siswa</th>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             NISN</th>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Status</th>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Keterangan</th>
                                     </tr>
                                 </thead>
                                 <tbody class="bg-white divide-y divide-gray-200">
                                     @foreach ($presensi->presensiDetails as $index => $detail)
                                         <tr class="hover:bg-gray-50 transition-colors duration-200">
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                 {{ $index + 1 }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap">
                                                 <div class="flex items-center">
                                                     <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center">
                                                         <span class="text-sm font-medium text-gray-600">
                                                             {{ substr($detail->siswa->nama_siswa, 0, 1) }}
                                                         </span>
                                                     </div>
                                                     <div class="ml-4">
                                                         <div class="text-sm font-medium text-gray-900">
                                                             {{ $detail->siswa->nama_siswa }}
                                                         </div>
                                                         <div class="text-sm text-gray-500">
                                                             {{ $detail->siswa->jenis_kelamin }}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                 {{ $detail->siswa->nis }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap">
                                                 <select
                                                     class="kehadiran-select rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm"
                                                     data-detail-id="{{ $detail->id }}">
                                                     <option value="hadir" {{ $detail->status === 'hadir' ? 'selected' : '' }}>Hadir</option>
                                                     <option value="sakit" {{ $detail->status === 'sakit' ? 'selected' : '' }}>Sakit</option>
                                                     <option value="izin" {{ $detail->status === 'izin' ? 'selected' : '' }}>Izin</option>
                                                     <option value="alpa" {{ $detail->status === 'alpa' ? 'selected' : '' }}>Alpa</option>
                                                 </select>
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap">
                                                 <input type="text"
                                                     class="keterangan-input rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm w-full"
                                                     data-detail-id="{{ $detail->id }}" value="{{ $detail->keterangan }}"
                                                     placeholder="Tambahkan keterangan...">
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>

                     <!-- Action Buttons -->
                     <div class="mt-6 flex justify-end space-x-3">
                         <button onclick="window.history.back()"
                             class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                             Batal
                         </button>
                         <button onclick="updatePresensi()"
                             class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                             Simpan Perubahan
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script>
         async function updatePresensi() {
             try {
                 const pertemuan = document.getElementById('pertemuan').value;
                 const materi = document.getElementById('materi').value;
                 const presensiDetails = [];

                 if (!pertemuan || !materi) {
                     Swal.fire({
                         icon: 'warning',
                         title: 'Peringatan',
                         text: 'Mohon lengkapi semua data'
                     });
                     return;
                 }

                 document.querySelectorAll('.kehadiran-select').forEach(select => {
                     const detailId = select.dataset.detailId;
                     const keterangan = document.querySelector(`.keterangan-input[data-detail-id="${detailId}"]`).value;

                     presensiDetails.push({
                         id: detailId,
                         status: select.value,
                         keterangan: keterangan
                     });
                 });

                 const response = await fetch(`/user/presensi/{{ $presensi->id }}`, {
                     method: 'PUT',
                     headers: {
                         'Content-Type': 'application/json',
                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                         'Accept': 'application/json'
                     },
                     body: JSON.stringify({
                         pertemuan: pertemuan,
                         materi: materi,
                         presensi_detail: presensiDetails
                     })
                 });

                 const data = await response.json();

                 if (data.status === 'success') {
                     await Swal.fire({
                         icon: 'success',
                         title: 'Berhasil!',
                         text: data.message,
                         timer: 1500,
                         showConfirmButton: false
                     });
                     window.location.href = '{{ route('user.presensi.list') }}';
                 } else {
                     throw new Error(data.message);
                 }
             } catch (error) {
                 console.error('Error:', error);
                 Swal.fire({
                     icon: 'error',
                     title: 'Error!',
                     text: error.message
                 });
             }
         }
     </script>
 </x-layout>
