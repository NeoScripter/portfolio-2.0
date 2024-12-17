<header x-data="{ showPopup: false }"
    class="sticky top-0 z-30 flex items-center justify-between gap-4 px-6 py-2 bg-white border-b border-gray-300 font-main sm:justify-start sm:px-8 sm:bg-black-primary sm:text-white">
    <img src="{{ asset('images/partials/logo.webp') }}" alt="Byte Engine logo"
        class="w-12 h-12 mt-1 sm:invert sm:w-16 sm:h-16">

    <div class="flex-1 hidden gap-3 px-4 py-2 ml-4 border-l border-gray-400 sm:flex sm:justify-between">
        <div class="pl-8">
            <div class="tracking-[4px] text-lg md:text-2xl font-thin font-main mb-3">WEB DEVELOPMENT BYTE ENGINE
            </div>
            <nav>
                <ul class="flex items-center gap-6 text-sm font-bold tracking-widest uppercase md:gap-10">
                    <li><a href="/" class="transition-colors duration-300 hover:text-gray-500"
                            wire:navigate.hover>Home</a>
                    </li>
                    <li><a href="/portfolio" class="transition-colors duration-300 hover:text-gray-500"
                            wire:navigate.hover>Portfolio</a></li>
                    <li><a href="/services" class="transition-colors duration-300 hover:text-gray-500"
                            wire:navigate.hover>Services</a></li>
                    <li><a href="/about" class="transition-colors duration-300 hover:text-gray-500"
                            wire:navigate.hover>About
                            me</a></li>
                </ul>
            </nav>
        </div>
        <div class="flex-shrink-0">
            <div
                class="relative pr-1 ml-auto lang-toggle w-max group hover:after:text-gray-400 after:transition-colors ">
                <x-user.select-lang />
            </div>
            <x-user.button :is_black="false">
                HIRE ME
            </x-user.button>
        </div>
    </div>

    <button @click="showPopup = true" class="w-8 h-8 group sm:hidden">
        <span class="block w-full h-0.5 bg-black group-hover:bg-gray-500"></span>
        <span class="block w-full h-0.5 mt-1.5 bg-black group-hover:bg-gray-500"></span>
        <span class="block w-full h-0.5 mt-1.5 bg-black group-hover:bg-gray-500"></span>
        <span class="relative font-bold group-hover:text-gray-500 tracking-[2px] -top-1 font-main text-xxxs">MENU</span>
    </button>

    @include('partials.header.popup')
</header>
