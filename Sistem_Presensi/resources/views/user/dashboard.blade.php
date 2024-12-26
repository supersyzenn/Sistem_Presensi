<x-layout>

    <main class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Selamat datang, {{ Auth::user()->name }}</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-6">
                <div class="flex justify-between">
                    <div>
                        <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                            Data Siswa
                        </h5>
                        <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">{{ $totalSiswa }} Siswa Dan Siswi</p>
                    </div>
                </div>
                <div id="line-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-2.5">
                    <div class="pt-5">
                        {{-- <a href="kelasadm" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3.5 h-3.5 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z" />
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                            </svg>
                            Lihat Data Siswa
                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="flex flex-col space-y-6">
                <!-- Absensi -->
                <div class="bg-teal-500 rounded-lg shadow-md w-full relative overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-6">
                        <h2 class="text-white text-lg font-semibold">Daftar Presensi</h2>
                        <img src="/img/vabsen.png" alt="Absensi Icon" class="h-14">
                    </div>
                    <div class="bg-teal-600 text-white text-center py-2">
                        <a href="{{ route('user.presensi.list') }}" class="inline-flex items-center text-sm">
                            selengkapnya <span class="ml-2">
                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="bg-green-500 rounded-lg shadow-md w-full relative overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-6">
                        <h2 class="text-white text-lg font-semibold">Jadwal Mengajar {{ Auth::user()->name }}</h2>
                        <img src="/img/vinfaq.png" alt="Infaq Icon" class="h-12">
                    </div>
                    <div class="bg-green-600 text-white text-center py-2">
                        <a href="{{ route('user.jadwal') }}" class="inline-flex items-center text-sm">
                            selengkapnya <span class="ml-2">
                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="{{ asset('tailwindcharts/js/apexcharts.js') }}"></script>
    <script src="{{ asset('tailwindcharts/js/flowbite.js') }}"></script>

    <script>
        // Mengambil data dari controller
        const categories = @json($categories);
        const series = @json($series);

        const options = {
            chart: {
                height: 350, // Set ketinggian spesifik
                maxWidth: "100%",
                type: "line",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return seriesName + ' :';
                        }
                    },
                    formatter: function(value) {
                        return value + ' Siswa';
                    }
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + ' Siswa';
                }
            },
            stroke: {
                width: 3,
                curve: 'smooth'
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
            },
            series: series,
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -25,
                offsetX: -5
            },
            xaxis: {
                categories: categories,
                labels: {
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                title: {
                    text: 'Tahun Angkatan'
                }
            },
            yaxis: {
                show: true,
                min: 0,
                max: function(max) {
                    return Math.ceil(max / 5) * 5; // Pembulatan ke atas ke kelipatan 5
                },
                labels: {
                    formatter: function(value) {
                        return Math.round(value) + ' Siswa';
                    }
                },
                title: {
                    text: 'Jumlah Siswa'
                }
            },
        }

        if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("line-chart"), options);
            chart.render();
        }
    </script>
</x-layout>