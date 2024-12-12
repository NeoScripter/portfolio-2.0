<div class="pb-12 space-y-12 md:space-y-16 md:pb-16">

    <section>

        <div
            class="relative flex items-end gap-4 px-4 pt-12 md:px-10 sm:items-center h-60 xs:h-80 sm:h-120 md:h-160 bg-black/30">
            <div class="w-1/2 p-2 text-white md:w-3/5 md:p-4 bg-black/40">
                <span class="block mb-2 italic tracking-widest xs:text-lg md:text-xl md:mb-3">Byte Engine</span>
                <h1
                    class="mb-5 text-lg font-light tracking-widest uppercase xs:text-2xl sm:text-3xl md:text-4xl text-balance font-main">
                    Elegant and performant websites</h1>
                <div class="hidden sm:block">
                    <p
                        class="mb-4 text-xs font-light tracking-wider uppercase md:mb-7 sm:text-lg md:text-xl font-main text-balance">
                        Hi there! I'm Ilya, a passionate web developer who creates high-quality, fast, and scalable apps
                        with appealing UI.</p>
                    <div class="flex gap-5 text-xs font-bold uppercase font-main md:gap-7">
                        <a href=""
                            class="block tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">
                            +63 950 464 35 91</a>
                        <a href=""
                            class="block tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">more
                            about
                            me</a>
                        <a href=""
                            class="block tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">
                            Hire
                            me</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-full h-full -z-10">
                <video id="autoVideo" class="object-cover object-right-top w-full h-full"
                    src="{{ asset('images/home/video_bg.mp4') }}" autoplay loop controls></video>
            </div>

        </div>

        <div class="px-10 pt-5 sm:hidden">
            <p class="mb-3 text-sm font-light tracking-wider text-center uppercase font-main text-balance">
                Hi there! I'm Ilya, a passionate web developer who creates high-quality, fast, and scalable apps
                with appealing UI.</p>
            <div class="pt-3 space-y-3 text-xs uppercase border-t border-gray-300 font-main">
                <a href=""
                    class="block mx-auto tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">
                    +63 950 464 35 91</a>
                <a href=""
                    class="block mx-auto tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">more
                    about me</a>
                <a href=""
                    class="block mx-auto tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">
                    Hire
                    me</a>
            </div>
        </div>

    </section>

    <section class="px-5 select-none xs:px-10">

        <div
            class="grid max-w-6xl gap-4 mx-auto my-12 tracking-widest sm:my-16 md:my-24 xs:gap-6 grid-cols-auto-fit-120 sm:gap-8">

            @php
                $content = ['React', 'PHP', 'Rust', 'SQL', 'Laravel', 'Typescript', 'WordPress'];
                $images = ['react', 'php', 'rust', 'sql', 'laravel', 'ts', 'wp'];
                $inverted = [true, false, false, false, false, false, true];
                $shifted_top = [false, true, true, true, true, true, true];
                $shifted_right = [false, false, false, true, false, false, false];
            @endphp

            @for ($i = 0; $i < count($content); $i++)
                <x-user.stack-logo :inverted="$inverted[$i]" :large="$i === 0 ? true : false" :image="asset('images/logos/' . $images[$i] . '.webp')" :shifted_top="$shifted_top[$i]"
                    :shifted_right="$shifted_right[$i]" :alt="$content[$i] . 'logo'" :gap="$i === 0 ? false : true">
                    {{ $content[$i] }}
                </x-user.stack-logo>
            @endfor

        </div>

        <div class="max-w-4xl px-10 py-8 mx-auto md:max-w-screen-3xl sm:py-12 md:py-16 sm:px-16 bg-gray-primary">
            <h2
                class="mb-4 text-lg font-thin tracking-widest uppercase md:mb-8 md:text-center md:w-2/3 md:mx-auto sm:mb-6 xs:text-2xl md:text-3xl lg:text-4xl text-balance font-main">
                crafting unique and bespoke websites with excellent quality</h2>

            <div class="mx-auto space-y-3 tracking-wide md:text-center sm:text-lg md:text-xl text-balance md:w-3/5">
                <p>Welcome to my Web Development Studio – where creativity meets functionality!</p>

                <p>I’m Ilya, a passionate web developer with a proven track record of crafting stunning, high-performing
                    websites tailored to your unique needs. Whether you're launching a new brand, revamping your online
                    presence, or creating an innovative digital experience, I bring your vision to life with sleek
                    designs, seamless functionality, and cutting-edge technologies.</p>

                <p>With a deep understanding of modern web standards, including responsive design, blazing-fast
                    performance, and user-centric interfaces, I deliver websites that not only look amazing but also
                    drive real results. My expertise spans everything from elegant single-page portfolios to robust
                    e-commerce platforms, ensuring each project is as unique and dynamic as the client behind it.</p>

                <p>Let’s build something extraordinary together – because your website deserves nothing less than the
                    best.</p>
            </div>
        </div>
    </section>

    @isset($projects)
        @include('partials.home.carousel')
    @endisset


    @isset($services)
        <section>
            <h2
                class="mb-5 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-12 md:mb-20 font-main xs:text-2xl md:text-3xl lg:text-4xl">
                Services and prices</h2>

            <div
                class="grid max-w-sm gap-6 px-10 mx-auto sm:max-w-screen-lg sm:gap-10 sm:grid-cols-2 md:grid-cols-auto-fit-300">

                @foreach ($services as $service)
                    <x-user.service-card :image="$service->image" :alt="''" :title="$service->title_en" :deadline="$service->deadline_en"
                        :desc="Str::words($service->description_en, 20)" :price="$service->min_price" />
                @endforeach

            </div>

            <x-user.link :is_black="true" :url="''" :class="'mt-10 sm:mt-14 md:mt-20'">
                SEE ALL SERVICES
            </x-user.link>

        </section>
    @endisset

    <section class="bg-center bg-cover h-160" style="background-image: url('{{ asset("images/home/quote-12.jpg") }}')">

        <div class="flex flex-col items-center justify-center h-full gap-6 bg-black/70">

            <div class="w-3/4 p-4 text-5xl italic tracking-wider text-white bg-black/20">
                <div class="w-40 h-40 mx-auto mb-3">
                    <img src="{{ asset('images/home/hero-bw.webp') }}" alt="" class="object-cover object-top w-full h-full">
                </div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ipsa tenetur impedit pariatur, cupiditate quia ipsam, fugit harum vitae officia asperiores veniam aperiam corporis corrupti aut sed, nam optio tempora.

            </div>
        </div>

    </section>
</div>
