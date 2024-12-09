<div>
    <section class="gap-4 px-10 py-12 bg-black sm:px-16 md:px-24 sm:py-16 md:py-24">

        <div class="pl-10 text-white">
            <h1 class="mb-5 text-lg font-light tracking-widest uppercase md:mb-10 sm:text-3xl md:text-6xl text-balance font-main">Elegant and performant websites at your service</h1>
            <div class="items-start sm:flex">
                <div class="basis-2/3">
                    <p class="mb-3 text-xs font-light tracking-wider uppercase md:mb-7 sm:text-lg md:text-3xl font-main text-balance">Hi there! I'm Ilya, a passionate web developer who creates high-quality, fast, and scalable apps with appealing UI. Hi there! I'm Ilya, a passionate web developer who creates high-quality, fast, and scalable apps with appealing UI.</p>
                    <a href="" class="block text-lg tracking-widest underline uppercase font-main underline-offset-4">more about me</a>
                    <button
                    class="px-16 py-4 mt-8 text-lg font-main tracking-[4px] font-medium text-black bg-white transition-colors duration-300 border border-white hover:bg-black-primary hover:text-white">HIRE
                    ME</button>
                </div>
                <div class="flex-shrink-0 mt-16 mb-8 mr-auto overflow-hidden ml-28 w-42 rounded-3xl">
                    <img src="{{ asset('images/home/hero-small.jpg') }}" alt="Hero Image" class="object-center w-full h-full">
                </div>
            </div>
        </div>

    </section>

    <section class="px-10">

        <div class="grid max-w-6xl gap-4 mx-auto my-12 tracking-widest sm:my-16 md:my-24 xs:gap-6 grid-cols-auto-fit-120 sm:gap-8">

            @php
                $content = ['React', 'PHP', 'Rust', 'SQL', 'Laravel', 'Typescript', 'WordPress'];
                $images = ['react', 'php', 'rust', 'sql', 'laravel', 'ts', 'wp'];
                $inverted = [true, false, false, false, false, false, true];
                $shifted_top = [false, true, true, true, true, true, true];
                $shifted_right = [false, false, false, true, false, false, false];
            @endphp

            @for ($i = 0; $i < count($content); $i++)
                <x-user.stack-logo :inverted="$inverted[$i]" :large="$i === 0 ? true : false" :image="asset('images/logos/' . $images[$i]. '.webp')" :shifted_top="$shifted_top[$i]" :shifted_right="$shifted_right[$i]" :alt="$content[$i] . 'logo'" :gap="$i === 0 ? false : true">
                    {{ $content[$i] }}
                </x-user.stack-logo>
            @endfor

        </div>

        <div class="max-w-4xl px-10 py-8 mx-auto md:max-w-screen-3xl sm:py-12 md:py-16 sm:px-16 bg-gray-primary">
            <h2 class="mb-4 text-lg font-thin tracking-widest uppercase md:mb-8 md:text-center md:w-2/3 md:mx-auto sm:mb-6 sm:text-3xl md:text-4xl xs:text-2xl text-balance font-main">crafting unique and bespoke websites with excellent quality</h2>

            <div class="mx-auto space-y-3 tracking-wide md:text-center sm:text-lg text-balance md:w-3/4">
                <p>Welcome to my Web Development Studio – where creativity meets functionality!</p>

                <p>I’m Ilya, a passionate web developer with a proven track record of crafting stunning, high-performing websites tailored to your unique needs. Whether you're launching a new brand, revamping your online presence, or creating an innovative digital experience, I bring your vision to life with sleek designs, seamless functionality, and cutting-edge technologies.</p>

                <p>With a deep understanding of modern web standards, including responsive design, blazing-fast performance, and user-centric interfaces, I deliver websites that not only look amazing but also drive real results. My expertise spans everything from elegant single-page portfolios to robust e-commerce platforms, ensuring each project is as unique and dynamic as the client behind it.</p>

                <p>Let’s build something extraordinary together – because your website deserves nothing less than the best.</p>
            </div>
        </div>
    </section>
</div>
