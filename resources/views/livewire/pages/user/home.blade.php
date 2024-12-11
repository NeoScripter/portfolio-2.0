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
                <a href="" class="block mx-auto tracking-widest underline underline-offset-4 w-max">
                    +63 950 464 35 91</a>
                <a href="" class="block mx-auto tracking-widest underline underline-offset-4 w-max">more
                    about
                    me</a>
                <a href="" class="block mx-auto tracking-widest underline underline-offset-4 w-max">
                    Hire
                    me</a>
            </div>
        </div>

    </section>

    <section class="px-5 xs:px-10">

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
                class="mb-4 text-lg font-thin tracking-widest uppercase md:mb-8 md:text-center md:w-2/3 md:mx-auto sm:mb-6 sm:text-3xl md:text-4xl xs:text-2xl text-balance font-main">
                crafting unique and bespoke websites with excellent quality</h2>

            <div class="mx-auto space-y-3 tracking-wide md:text-center sm:text-lg text-balance md:w-3/4">
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

    <section x-data="{
        slides: [{
                index: 0,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolor autem hic sapiente iure quaerat. Blanditiis, aspernatur. Molestiae, rerum quas! Voluptas quis officia dolorem nostrum itaque veniam hic accusantium magnam.',
                link: null
            },
            {
                index: 1,
                image: '{{ asset('images/home/port2.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                link: null
            },
            {
                index: 2,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                link: null
            },
            {
                index: 3,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolor autem hic sapiente iure quaerat. Blanditiis, aspernatur. Molestiae, rerum quas! Voluptas quis officia dolorem nostrum itaque veniam hic accusantium magnam.',
                link: null
            },
            {
                index: 4,
                image: '{{ asset('images/home/port2.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                link: null
            },
            {
                index: 5,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolor autem hic sapiente iure quaerat. Blanditiis, aspernatur. Molestiae, rerum quas! Voluptas quis officia dolorem nostrum itaque veniam hic accusantium magnam.',
                link: null
            },
            {
                index: 6,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolor autem hic sapiente iure quaerat. Blanditiis, aspernatur. Molestiae, rerum quas! Voluptas quis officia dolorem nostrum itaque veniam hic accusantium magnam.',
                link: null
            },
            {
                index: 7,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                link: null
            },
            {
                index: 8,
                image: '{{ asset('images/home/port1.webp') }}',
                title: 'Lorem ipsum dolores',
                desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                link: null
            }
        ],
        currentSlide: 4,
        applyTransition: true,
        multiplier: 0,
        isAnimating: false,
        shiftSlide(direction) {
            if (this.isAnimating) return;
            this.isAnimating = true;
            this.applyTransition = true;

            if (direction === 'next') {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                this.multiplier = 1;
                setTimeout(() => {
                    this.applyTransition = false;
                    this.multiplier = 0;

                    const firstSlide = this.slides.shift();
                    this.slides.push(firstSlide);
                    this.isAnimating = false;
                }, 500);
            } else if (direction === 'prev') {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.multiplier = -1;
                setTimeout(() => {
                    this.applyTransition = false;
                    this.multiplier = 0;

                    const lastSlide = this.slides.pop();
                    this.slides.unshift(lastSlide);
                    this.isAnimating = false;
                }, 500);
            }
        }
    }">

        <h2
            class="mb-5 text-lg font-thin tracking-widest text-center uppercase md:pt-14 md:mb-10 font-main xs:text-2xl sm:text-3xl md:text-4xl">
            Featured portfolio pieces</h2>

        <div class="relative h-160">
            <div :class="applyTransition ? 'transition-all duration-500' : ''"
                class="absolute w-[136%] grid items-center justify-start grid-flow-col gap-8 py-10 h-full"
                :style="`left: calc(-37% - ${multiplier * 19}%)`">

                <template x-for="slide in slides" :key="slide.index">
                    <div x-data="{ expanded: currentSlide === slide.index }" x-init="$watch('currentSlide', value => expanded = value === slide.index)"
                        class="flex flex-col items-center gap-4 pb-6 shadow-xl w-70" x-cloak
                        :class="expanded ? 'h-full w-90' : 'h-4/5'">
                        <!-- Slide Content -->
                        <div x-show="expanded" x-collapse.min.400px.duration.500ms>
                            <img :src="slide.image" :alt="slide.title"
                                class="object-cover object-center w-full h-full">
                        </div>
                        <h3 class="mt-2 font-medium tracking-widest uppercase font-main" x-text="slide.title"></h3>
                        <div x-show="expanded" x-collapse.duration.500ms class="flex flex-col px-6 md:px-10">
                            <span class="block w-10 h-1 mx-auto mb-6 border-t-2 border-black"></span>
                            <p class="block mb-6" x-text="slide.desc"></p>
                            <a :href="slide.link"
                                class="px-10 mt-auto block py-3 w-full cursor-pointer text-xxs text-center tracking-[4px] font-bold mb-4 font-main text-white uppercase bg-black transition-colors duration-300 border border-black hover:bg-white hover:text-black">
                                Details
                            </a>
                        </div>
                    </div>
                </template>


            </div>
        </div>

        <div class="mx-auto w-max font-main">
            <button @click="shiftSlide('prev')">&lt;</button>
            <span x-text="(currentSlide + 7 - 4) % 7 + 1"></span> / <span x-text="slides.length - 2"></span>
            <button @click="shiftSlide('next')">&gt;</button>
        </div>

    </section>
</div>
