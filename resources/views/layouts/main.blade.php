<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
    <title>Movies App</title>
</head>
<body class="font-sans bg-gray-800 text-white">
    @livewireScripts
    <nav class="border-b border-gray-700">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movie.index') }}">
                        <img src="/images/icon.png" class="w-14 ml-2" alt="movie icon">
                    </a>
                </li>
                {{-- <li class="md:ml-16 my-2">
                    <a href="{{ route('movie.index') }}" class="hover:text-gray-300">Movies</a>
                </li> --}}
                {{-- <li class="md:ml-8 my-2">
                    <a href="#" class="hover:text-gray-300">Tv Series</a>
                </li>
                <li class="md:ml-8 my-2">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li> --}}
            </ul>
            <livewire:search-dropdown>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
</body>
</html>
