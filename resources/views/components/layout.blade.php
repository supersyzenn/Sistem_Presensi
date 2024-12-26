<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>SADINA - Dashboard Guru</title>
    <link rel="icon" href="/img/logosmk.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('tailwindcharts/css/flowbite.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Laravel PWA -->
    @laravelPWA
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
            /* Agar konten utama mengisi ruang yang tersisa */
        }

        footer {
            background-color: #fff;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <main>
        <x-navbar></x-navbar>
        {{ $slot }}
    </main>
    <x-footer></x-footer>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#logout-button').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Logout",
                    text: "Apakah Anda yakin ingin keluar?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Logout!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logout-form').submit();
                    }
                });
            });
        });
    </script>
</body>

</html>
