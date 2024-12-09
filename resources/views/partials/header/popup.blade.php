<div x-show="showPopup" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" @click.away="showPopup=false"
    x-cloak class="absolute top-0 right-0 z-10 p-4 bg-white shadow-xl w-80 md:hidden">

    <div class="flex items-center justify-between gap-2">

        <div class="relative pr-1 lang-toggle w-max group hover:after:text-gray-600 after:transition-colors ">
            <select name="" id=""
                class="p-0 mb-2 bg-white text-black font-main select-field-mobile appearance-none tracking-[2px] text-xs font-regular border-none w-20 block cursor-pointer transition-colors group-hover:text-gray-600 outline-none shadow-none focus-visible:text-gray-600">
                <option class="tracking-[2px]" value="">ENGLISH</option>
                <option class="tracking-[2px]" value="">FRENCH</option>
            </select>
        </div>

        <button @click="showPopup = false" class="w-10 mb-4 text-3xl text-black">&times</button>

    </div>

    <div>
        <img src="{{ asset('images/partials/logo.webp') }}" alt="Byte Engine logo" class="w-20 h-20 mb-4">
        <div class="mb-2 font-serif text-lg font-normal tracking-[5px] uppercase">Web Development</div>
        <div class="text-2xl uppercase tracking-[2px]">Byte Engine</div>
    </div>

    <nav class="mt-6">
        <ul class="space-y-6 text-sm tracking-widest uppercase">
            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">Home</a>
            </li>
            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">Portfolio</a></li>
            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">Services</a></li>
            <li><a href="" class="transition-colors duration-300 hover:text-gray-500">About
                    me</a></li>
        </ul>
    </nav>

    <div class="pt-8 mt-8 mb-4 border-t border-black">
        <button
            class="px-10 py-3 text-xxs tracking-[4px] font-bold text-white bg-black-primary transition-colors duration-300 border border-black-primary hover:bg-white hover:text-black-primary">HIRE
            ME</button>
    </div>
</div>
