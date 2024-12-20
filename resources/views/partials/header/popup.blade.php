<div x-show="showPopup" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" @click.away="showPopup=false"
    x-cloak id="mobile-menu" role="dialog" aria-labelledby="mobile-menu-title" aria-modal="true"
    class="absolute top-0 right-0 z-30 p-4 bg-white shadow-xl w-80 md:hidden">

    <div class="flex items-center justify-between gap-2">

        <div class="relative pr-1 lang-toggle w-max group hover:after:text-gray-600 after:transition-colors ">
            <x-user.select-lang :is_black=false />
        </div>

        <button @click="showPopup = false" class="w-10 mb-4 text-3xl text-black" aria-label="Close menu">&times</button>

    </div>

    <div>
        <h2 id="mobile-menu-title" class="sr-only">Mobile Navigation Menu</h2>
        <img src="{{ asset('images/partials/logo.webp') }}" alt="Byte Engine logo" class="w-20 h-20 mb-4">
        <div class="mb-2 font-serif text-lg font-normal tracking-[5px] uppercase">Web Development</div>
        <div class="text-2xl uppercase tracking-[2px]">Byte Engine</div>
    </div>

    <nav class="mt-6" aria-label="Mobile Navigation">
        <ul class="space-y-6 text-sm tracking-widest uppercase">
            <li><a href="/" class="transition-colors duration-300 hover:text-gray-500"
                    wire:navigate.hover>Home</a>
            </li>
            <li><a href="/portfolio" class="transition-colors duration-300 hover:text-gray-500"
                    wire:navigate.hover>Portfolio</a></li>
            <li><a href="/services" class="transition-colors duration-300 hover:text-gray-500"
                    wire:navigate.hover>Services</a></li>
            <li><a href="/about" class="transition-colors duration-300 hover:text-gray-500" wire:navigate.hover>About
                    me</a></li>
        </ul>
    </nav>

    <div class="pt-8 mt-8 mb-4 border-t border-black">
        <button
            class="px-10 py-3 text-xxs tracking-[4px] font-bold text-white bg-black-primary transition-colors duration-300 border border-black-primary hover:bg-white hover:text-black-primary">HIRE
            ME</button>
    </div>
</div>
