<section x-data="{
    slides: {{ json_encode($projects, JSON_HEX_APOS | JSON_HEX_QUOT) }},
    currentSlide: (() => {
        return Math.ceil((screen.width / 2) / 280) + (screen.width < 1740 ? 1 : 0);
    })(),
    applyTransition: true,
    multiplier: 0,
    displayedSlide: 1,
    isAnimating: false,
    shiftSlide(direction) {
        if (this.isAnimating) return;
        this.isAnimating = true;
        this.applyTransition = true;

        if (direction === 'next') {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            this.displayedSlide = this.displayedSlide < 7 ? this.displayedSlide + 1 : 1;
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
            this.displayedSlide = this.displayedSlide > 1 ? this.displayedSlide - 1 : 7;
            this.multiplier = -1;
            setTimeout(() => {
                this.applyTransition = false;
                this.multiplier = 0;

                const lastSlide = this.slides.pop();
                this.slides.unshift(lastSlide);
                this.isAnimating = false;
            }, 500);
        }
    },
    touchStartX: 0,
    touchEndX: 0,
    startSwipe(event) {
        this.touchStartX = event.touches[0].clientX;
    },

    moveSwipe(event) {
        this.touchEndX = event.touches[0].clientX;
    },

    endSwipe() {
        const swipeDistance = this.touchStartX - this.touchEndX;

        if (swipeDistance > 50) {
            this.shiftSlide('next');
        } else if (swipeDistance < -50) {
            this.shiftSlide('prev');
        }

        this.touchStartX = 0;
        this.touchEndX = 0;
    }
}" class="select-none">

    <h2
        class="mb-5 text-lg font-thin tracking-widest text-center uppercase md:pt-14 font-main xs:text-2xl md:text-3xl lg:text-4xl">
        Featured portfolio pieces</h2>

    <p class="w-4/5 mx-auto mb-5 text-center sm:mb-10 xs:text-lg md:text-xl lg:text-2xl">Full list of services that I
        provide for the clients and that they enjoy a lot</p>

    <div class="relative w-[1640px] h-160">
        <div :class="applyTransition ? 'transition-all duration-500' : ''"
            class="absolute w-[136%] grid items-center md:-translate-x-16 xl:translate-x-0 justify-start grid-flow-col gap-8 py-10 h-full"
            :style="`left: calc(-37% - ${multiplier * 19}%)`" @touchstart="startSwipe($event)"
            @touchmove="moveSwipe($event)" @touchend="endSwipe()">

            <template x-for="slide in slides" :key="slide.index">
                <article x-data="{ expanded: currentSlide === slide.index }" x-init="$watch('currentSlide', value => expanded = value === slide.index)"
                    class="grid gap-4 pb-2 transition-all duration-500 shadow-xl w-70" x-cloak
                    :class="expanded ? 'h-[550px] xs:w-90 grid-rows-open' : 'h-[450px] grid-rows-closed'"
                    :aria-expanded="expanded" role="region" :aria-labelledby="`portfolio-title-${slide.index}`">
                    <!-- Slide Content -->
                    <div class="flex flex-col overflow-hidden">
                        <div class="overflow-hidden basis-9/10">
                            <img :src="slide.image" :alt="slide.image_alt"
                                class="object-cover object-top w-full h-full" loading="lazy">
                        </div>
                        <h3 :id="`portfolio-title-${slide.index}`"
                            class="block mt-4 text-sm font-medium tracking-widest text-center uppercase basis-1/10 md:text-base font-main"
                            x-text="slide.title"></h3>
                    </div>
                    <div class="flex flex-col items-center px-6 overflow-hidden md:px-10">
                        <span class="block w-10 h-1 mx-auto mb-6 border-t-2 border-black"></span>
                        <p class="block mb-6" x-text="slide.desc"></p>
                        <a :href="slide.link"
                            class="px-10 mt-auto block py-3 mb-4 w-full cursor-pointer text-xxs text-center tracking-[4px] font-bold font-main text-white uppercase bg-black transition-colors duration-300 border border-black hover:bg-white hover:text-black"
                            :aria-label="`View details for ${slide.title}`">
                            Details
                        </a>
                    </div>
                </article>
            </template>


        </div>
    </div>

    <div class="flex items-center gap-6 mx-auto text-sm font-bold w-max font-main" role="region"
        aria-label="Slide navigation" x-on:keydown.arrow-left="shiftSlide('prev')"
        x-on:keydown.arrow-right="shiftSlide('next')">
        <button @click="shiftSlide('prev')" class="w-5 h-5" aria-label="Previous slide">
            <img src="{{ asset('images/partials/carrette-left.svg') }}" class="w-full h-full" alt="Arrow left"
                aria-hidden="true">
        </button>
        <div>
            <span x-text="displayedSlide" aria-label="Current slide"></span> / <span x-text="slides.length - 2"
                aria-label="Total slides"></span>
        </div>
        <button @click="shiftSlide('next')" class="w-5 h-5" aria-label="Next slide">
            <img src="{{ asset('images/partials/carrette-right.svg') }}" class="w-full h-full" alt="Arrow right"
                aria-hidden="true">
        </button>
    </div>

    <x-user.link :is_black="true" :url="''" :class="'mt-10 md:mt-16'">
        SEE ALL PROJECTS
    </x-user.link>


</section>
