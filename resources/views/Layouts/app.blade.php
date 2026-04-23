<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | @yield('title')</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans">
    <div class="max-w-md mx-auto relative min-h-screen">
        <!-- Header Profissional -->
        <div class="bg-linear-to-r from-Primary to-Primary-dark px-7 py-6 rounded-b-3xl mb-6">
            @yield('header')
        </div>

        <!-- Conteúdo Principal -->
        <div class="px-5">
            @yield('content')
        </div>

        <!-- Bottom Navigation Profissional -->
        <div
            class=" fixed bottom-4 left-4 right-4 max-w-sm mx-auto rounded-full shadow-lg p-2 flex justify-around items-center border border-Dark bg-white/8 backdrop-blur-xl">
            <a href="{{ route('home') }}"
                class="flex flex-col items-center decoration-0  {{ request()->routeIs('home') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                <i class="fas fa-home text-lg"></i>
                <span class=" text-xs mt-1">Início</span>
            </a>

            <a href="{{ route('mural') }}"
                class="flex flex-col items-center decoration-0 {{ request()->routeIs('mural') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                <i class="fas fa-chart-bar text-lg"></i>
                <span class=" text-xs mt-1">Mural</span>
            </a>

            <a href="{{ route('myjobs') }}"
                class="flex flex-col items-center decoration-0 {{ request()->routeIs('myjobs') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                <i class="fas fa-briefcase text-lg"></i>
                <span class=" text-xs mt-1">Meus Jobs</span>
            </a>

            <a href="{{ route('walet') }}"
                class="flex flex-col items-center decoration-0 {{ request()->routeIs('walet') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                <i class="fas fa-wallet text-lg"></i>
                <span class=" text-xs mt-1">Carteira</span>
            </a>
        </div>
        <div style="height: 5rem;"></div>
    </div>
</body>

</html>
