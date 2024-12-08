<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-serif antialiased">
    <div class="max-w-screen-xl min-h-screen mx-auto overflow-x-hidden">

        <header class="sticky top-0 flex items-center justify-between gap-4 px-6 py-2 bg-white border-b border-gray-300 font-main sm:justify-start sm:px-8 sm:bg-black-primary sm:text-white">
            <img src="{{ asset('images/partials/logo.webp') }}" alt="" class="w-12 h-12 mt-1 sm:invert sm:w-16 sm:h-16">

            <div class="flex-1 hidden gap-3 px-4 py-2 ml-4 border-l border-gray-400 sm:flex sm:justify-between">
                <div class="pl-8">
                    <div class="tracking-[6px] text-lg md:text-2xl font-normal font-main mb-3">WEB DEVELOPMENT BYTE ENGINE</div>
                    <nav>
                        <ul class="flex items-center gap-6 text-sm font-bold tracking-widest uppercase md:gap-10">
                            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">Home</a></li>
                            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">Portfolio</a></li>
                            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">Services</a></li>
                            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">About me</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="flex-shrink-0">
                    <select name="" id="" class="hidden">
                        <option value="">ENGLISH</option>
                        <option value="">FRENCH</option>
                    </select>
                    <button class="px-10 py-3 text-xxs tracking-[4px] font-bold text-black bg-white transition-colors duration-300 border border-white hover:bg-black-primary hover:text-white">HIRE ME</button>
                </div>
            </div>

            <button class="w-8 h-8 group sm:hidden">
                <span class="block w-full h-0.5 bg-black group-hover:bg-gray-500"></span>
                <span class="block w-full h-0.5 mt-1.5 bg-black group-hover:bg-gray-500"></span>
                <span class="block w-full h-0.5 mt-1.5 bg-black group-hover:bg-gray-500"></span>
                <span class="relative font-bold group-hover:text-gray-500 tracking-[2px] -top-1 font-main text-xxxs">MENU</span>
            </button>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
