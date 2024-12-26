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


<body class="h-full">

    <main class="h-full flex items-center justify-center">
        <div class="w-1/2 pl-24 pr-4">
            <div class="flex justify-center mb-4">
                <img class="w-auto" src="/img/SADINA.png" alt="Logo SALAM">
            </div>
        </div>
        <div class="w-1/2 pl-4 pr-24">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-center text-2xl font-bold mb-4">Silahkan Masuk</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $dataUser)
                                <li>{{ $dataUser }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="space-y-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col">
                        <label class="block text-gray-700">Username</label>
                        <input type="text" value="{{ old('username') }}" name="username"  class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Username">
                    </div>
                    <div class="flex flex-col">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Password">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
