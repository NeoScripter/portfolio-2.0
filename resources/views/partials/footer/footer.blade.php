<footer class="px-10 bg-black-primary xs:px-20 py-14" aria-labelledby="footer-title">
    <h2 id="footer-title" class="sr-only">Footer Navigation</h2>

    <img src="{{ asset('images/partials/logo.webp') }}" alt="Byte Engine logo"
    class="w-32 h-32 mx-auto mb-8 sm:mb-10 md:mb-16 invert">

    <nav class="mb-8 sm:mb-16" aria-label="Footer navigation">
        <ul class="grid gap-6 text-white xs:gap-10 sm:grid-cols-4 sm:gap-6">
            <li>
                <a href="/" wire:navigate.hover class="block text-lg italic transition-colors duration-300 xs:text-xl md:text-2xl hover:text-gray-400">Home
                    <span class="block mt-1 not-italic font-bold tracking-widest uppercase xs:mt-2 xs:text-xs md:mt-4 md:text-sm text-balance text-xxs font-main">Return to the home page</span>
                </a>
            </li>
            <li>
                <a href="/portfolio" wire:navigate.hover class="block text-lg italic transition-colors duration-300 hover:text-gray-400 xs:text-xl md:text-2xl">Portfolio
                    <span class="block mt-1 not-italic font-bold tracking-widest uppercase xs:mt-2 xs:text-xs md:mt-4 md:text-sm text-balance text-xxs font-main">Check out my portfolio</span>
                </a>
            </li>
            <li>
                <a href="/about" wire:navigate.hover class="block text-lg italic transition-colors duration-300 hover:text-gray-400 xs:text-xl md:text-2xl">About me
                    <span class="block mt-1 not-italic font-bold tracking-widest uppercase xs:mt-2 xs:text-xs md:mt-4 md:text-sm text-balance text-xxs font-main">Find out more about me</span>
                </a>
            </li>
            <li>
                <a href="/services" wire:navigate.hover class="block text-lg italic transition-colors duration-300 hover:text-gray-400 xs:text-xl md:text-2xl">Services
                    <span class="block mt-1 not-italic font-bold tracking-widest uppercase xs:mt-2 xs:text-xs md:mt-4 md:text-sm text-balance text-xxs font-main">See the full list of services that I provide</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="flex items-center justify-between mb-3 border-b border-gray-500 xs:mb-4">
        <ul class="flex items-center gap-6 py-3 transition-colors xs:py-4 md:gap-8">
            <li>
                <a href="https://github.com/NeoScripter" target="_blank" class="block w-6 h-6 footer-social" aria-label="Visit my GitHub profile">
                    {!! file_get_contents(public_path('images/partials/github.svg')) !!}
                </a>
            </li>
            <li>
                <a href="https://t.me/IlyaA2398" target="_blank" class="block w-6 h-6 footer-social" aria-label="Message me on Telegram">
                    {!! file_get_contents(public_path('images/partials/telegram.svg')) !!}
                </a>
            </li>
            <li>
                <a href="https://wa.me/639504643591" target="_blank" class="block w-6 h-6 footer-social" aria-label="Contact me on WhatsApp">
                    {!! file_get_contents(public_path('images/partials/whatsapp.svg')) !!}
                </a>
            </li>
        </ul>

        <div
        class="relative pr-1 text-white lang-toggle w-max group hover:after:text-gray-400 after:transition-colors ">
        <x-user.select-lang />
    </div>
    </div>

    <p class="text-xs tracking-widest text-gray-400 font-main" aria-label="Copyright notice">©Byte Engine. All Rights Reserved.</p>
</footer>
