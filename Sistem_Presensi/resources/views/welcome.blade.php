<!DOCTYPE html>
<html lang="id" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>SADINA</title>
    <link rel="icon" href="/img/logosmk.png" type="image/png">
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-100 p-2 text-black">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center pl-4">
                <div class="flex-shrink-0">
                    <img class="h-16 w-46" src="/img/SADINA.png" alt="Logo SMK Al-Mumtaz Abasi">
                </div>
            </div>
            <a href="{{ route('login') }}" class="font-semibold">Login</a>
        </div>
    </nav>
    <section class="h-screen relative flex items-center justify-start pl-12 bg-cover bg-center bg-no-repeat" style="background-image: url('/img/Slide1.png');">
        <div class="bg-teal-600 bg-opacity-60 absolute inset-0 "></div>
        <div class="relative z-10 text-white px-4">
            <p class="text-5xl font-bold leading-tight mb-6">
                "Mewujudkan peserta didik yang kompeten <br> dengan kemampuan profesional, <br>
                berwirausaha, berdaya saing global <br>
                dan berakhlakul karimah"
            </p>
        </div>
        <a href="https://wa.me/6285846861995" class="inline-flex items-center justify-center bg-teal-500 text-white px-6 py-3 rounded-lg hover:bg-teal-600 absolute bottom-6 right-6">
            <i class="fab fa-whatsapp mr-2"></i> Hubungi Admin
        </a>
    </section>
    <!-- Contact and Follow Section -->
    <footer class="bg-gray-800  text-white py-4 pb-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="row-start-1 row-span-2">
                <h3 class="text-lg font-bold mb-4">Contact Us</h3>

                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd" />
                        <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                    </svg>
                    <p>+62 858-4686-1995</p>
                </div>

                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                    </svg>
                    <p>esemka.almumtaz@gmail.com</p>
                </div>

                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                    </svg>

                    <p>Jl. H Abbas Ciborete, Cikiray, Kec. Cikidang,<br> Kabupaten Sukabumi, Jawa Barat 43367</p>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="w-full h-48">
                    <h3 class="text-lg font-bold mb-4 text-center">Our Location</h3>
                    <iframe
                        class="w-full h-full border-0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.7584813320397!2d106.72223651477364!3d-7.055045794914622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e683f9cb7e2f6e9%3A0x7b1d7aaf06a4e111!2sSMK%20Al%20Mumtaz%20Abasi!5e0!3m2!1sen!2sid!4v1636892747046!5m2!1sen!2sid"
                        allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>

            <div class="md:ml-auto">
                <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd" />
                    </svg>
                    <a href="https://www.instagram.com/smk.almumtaz?igsh=cHZ6N2Zqc3d1eG1k" class="text-teal-400 hover:text-teal-600">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
                <div class="flex items-center space-x-2 mb-2"><svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z" clip-rule="evenodd" />
                    </svg>

                    <a href="#" class="text-teal-400 hover:text-teal-600">

                        <i class="fab fa-youtube"></i> YouTube
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <x-footer></x-footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
