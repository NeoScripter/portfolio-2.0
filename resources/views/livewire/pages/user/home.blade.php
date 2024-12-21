<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    <section aria-labelledby="section-title" >

        <div
            class="relative flex items-end gap-4 px-4 pt-12 md:px-10 sm:items-center h-60 xs:h-80 sm:h-120 md:h-160 bg-black/30 after:absolute after:inset-0 after:-z-20 after:bg-black">
            <div class="w-1/2 p-2 text-white md:w-4/5 md:p-4 bg-black/50">
                <span id="section-title" class="block mb-2 italic tracking-widest xs:text-lg md:text-xl md:mb-3">Byte Engine</span>
                <h1
                    class="mb-5 text-lg font-light tracking-widest uppercase xs:text-2xl sm:text-3xl md:text-5xl text-balance font-main">
                    Elegant and performant websites</h1>
                <div class="hidden sm:block" x-data>
                    <p
                        class="mb-4 text-xs font-light tracking-wider uppercase md:mb-7 sm:text-lg md:text-2xl font-main text-balance">
                        Hi there! I'm Ilya, a passionate web developer who creates high-quality, fast, and scalable apps
                        with appealing UI.</p>
                    <div class="flex gap-5 text-sm font-bold uppercase font-main md:gap-7">
                        <a href="https://wa.me/639504643591" target="_blank"
                            class="block tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400"
                            aria-label="Contact me on WhatsApp at +63 950 464 35 91">
                            +63 950 464 35 91</a>
                        <a href="/about"
                            class="block tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400" aria-label="Learn more about me" wire:navigate.hover>more
                            about
                            me</a>
                        <button
                            @click="$dispatch('open-form')"
                            aria-label="Hire me for your project"
                            class="block tracking-widest underline uppercase transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">
                            Hire
                            me</button>
                    </div>
                </div>
            </div>
            <livewire:partials.video lazy />

        </div>

        <div class="px-10 pt-5 sm:hidden">
            <p class="mb-3 text-sm font-light tracking-wider text-center uppercase font-main text-balance">
                Hi there! I'm Ilya, a passionate web developer who creates high-quality, fast, and scalable apps
                with appealing UI.</p>
            <div class="pt-3 space-y-3 text-xs uppercase border-t border-gray-300 font-main">
                <a href="https://wa.me/639504643591" target="_blank"
                    class="block mx-auto tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400"
                    aria-label="Contact me on WhatsApp at +63 950 464 35 91">
                    +63 950 464 35 91</a>
                <a href="/about"
                    class="block mx-auto tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400" aria-label="Learn more about me" wire:navigate.hover>more
                    about me</a>
                <button
                    aria-label="Hire me for your project"
                    class="block mx-auto tracking-widest underline transition-colors duration-300 underline-offset-4 w-max hover:text-gray-400">
                    Hire
                    me</button>
            </div>
        </div>

    </section>

    <section class="px-5 select-none xs:px-10" aria-labelledby="tech-stack-title">

        <h2
        id="tech-stack-title"
        class="mb-2 text-lg font-thin tracking-widest text-center uppercase sm:mb-5 md:pt-14 font-main xs:text-2xl md:text-3xl lg:text-4xl">
        Tech stack</h2>


        <p class="w-4/5 mx-auto mb-5 text-center sm:mb-10 md:mb-12 xs:text-lg md:text-xl lg:text-2xl">Techonologies that I use</p>

        <div
            class="grid max-w-6xl gap-4 mx-auto mb-12 tracking-widest sm:mb-16 md:mb-24 xs:gap-6 grid-cols-auto-fit-120 sm:gap-8"
            aria-label="List of technologies used" role="list">

            @php
                $content = ['React', 'PHP', 'Rust', 'SQL', 'Laravel', 'Typescript', 'WordPress'];
                $images = ['react', 'php', 'rust', 'sql', 'laravel', 'ts', 'wp'];
                $inverted = [true, false, false, false, false, false, true];
            @endphp

            @for ($i = 0; $i < count($content); $i++)
                <x-user.stack-logo :inverted="$inverted[$i]" :image="asset('images/logos/' . $images[$i] . '.webp')"
                    :alt="$content[$i] . 'logo'">
                    {{ $content[$i] }}
                </x-user.stack-logo>
            @endfor

        </div>

        <div class="max-w-4xl px-10 py-8 mx-auto text-white md:max-w-screen-3xl sm:py-12 md:py-16 sm:px-16 bg-black-primary" aria-labelledby="crafting-title">
            <h2
                id="crafting-title"
                class="mb-4 text-lg font-medium tracking-widest uppercase md:mb-8 md:text-center md:w-2/3 md:mx-auto sm:mb-6 xs:text-2xl md:text-3xl lg:text-4xl text-balance font-main">
                crafting unique and bespoke websites with excellent quality</h2>

            <div class="mx-auto space-y-3 tracking-wide font-main md:text-center sm:text-lg md:text-xl text-balance md:w-3/5">
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
        <section aria-labelledby="services-title">
            <h2
                id="services-title"
                class="mb-2 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-5 font-main xs:text-2xl md:text-3xl lg:text-4xl">
                Services and prices</h2>

            <p class="w-4/5 mx-auto mb-5 text-center sm:mb-12 md:mb-20 xs:text-lg md:text-xl lg:text-2xl">Full list of
                services that I provide for the clients and that they enjoy a lot</p>

            <div class="grid gap-6 px-4 mx-auto sm:px-10 sm:max-w-screen-lg xs:gap-10 grid-cols-auto-fit-240">

                @foreach ($services as $service)
                    <x-user.service-card :id="$service->id" :image="$service->image" :image_medium="$service->image_medium" :image_small="$service->image_small" :image_tiny="$service->image_tiny" :alt="''" :title="$service->title_en" :deadline="$service->deadline_en"
                        :desc="Str::words($service->description_en, 40)" :price="$service->min_price" />
                @endforeach

            </div>

            <x-user.link :is_black="true" url="/services" :class="'mt-10 sm:mt-14 md:mt-20'">
                SEE ALL SERVICES
            </x-user.link>

        </section>
    @endisset

    @isset($reviews)
        <section aria-labelledby="reviews-title">
            <h2
                id="reviews-title"
                class="mb-2 text-lg font-thin tracking-widest text-center uppercase sm:mb-5 md:pt-14 font-main xs:text-2xl md:text-3xl lg:text-4xl">
                Clients' feedback</h2>

            <p class="w-4/5 mx-auto mb-5 text-center sm:mb-12 md:mb-20 xs:text-lg md:text-xl lg:text-2xl">Full list of
                services that I provide for the clients and that they enjoy a lot</p>

            <div class="px-40 pb-2 select-none sm:px-20" aria-labelledby="reviews-title">

                @php
                    $top_map = [[50, 85], [10, 50], [10, 50], [50, 85]];
                    $left_map = [[10, 50], [50, 90], [10, 50], [50, 90]];
                    $index = 0;
                @endphp

                <div class="relative h-160" role="list"
                aria-label="Client reviews">
                    @foreach ($reviews as $review)
                        @php
                            $image = $review['image'] === null ? null : $review['image'];
                            $top = rand($top_map[$index][0], $top_map[$index][1]);
                            $left = rand($left_map[$index][0], $left_map[$index][1]);
                        @endphp

                        <x-user.review :review="$review['review']" :name="$review['name']" :image="$image" :top="$top"
                            :left="$left" />

                        @php
                            $index = ($index + 1) % 4;
                        @endphp
                    @endforeach
                </div>
            </div>

        </section>
    @endisset

    <section class="bg-center bg-cover grayscale-[50%] h-100 md:h-140 lg:h-160"
        style="background-image: url('{{ asset('images/home/quote-bg.webp') }}')">

        <div class="flex flex-col items-center justify-center h-full gap-6 bg-black/50">

            <div
                class="px-6 pt-4 font-medium tracking-wider text-white sm:pt-8 md:pt-12 sm:text-xl xs:w-2/3 md:w-1/2 md:text-3xl lg:text-4xl font-main">
                <q>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ipsa tenetur impedit pariatur,
                    cupiditate quia ipsam, fugit harum vitae officia asperiores veniam aperiam corporis corrupti aut
                    sed, nam optio tempora.
                </q>
                <div class="flex items-center justify-end gap-4 mt-6 md:mt-10">
                    <div class="w-max">
                        <p class="text-xs sm:text-sm md:text-base text-end">Author</p>
                        <p class="text-sm sm:text-base md:text-xl">Ilya Andreev</p>
                    </div>
                    <div class="w-16 mr-6 h-18 sm:w-20 sm:h-22 md:w-20 md:h-26">
                        <img src="{{ asset('images/home/home-quote.webp') }}" alt="English:a man with short hair and glasses, wearing a patterned shirt and sitting in a chair. Русский: фото мужчины с короткими волосами и очками, в рубашке с узором, сидящего в кресле."
                            class="object-cover object-center w-full h-full rounded-xl">
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
