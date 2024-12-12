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
    }
}" class="select-none">

    <h2
        class="mb-5 text-lg font-thin tracking-widest text-center uppercase md:pt-14 md:mb-10 font-main xs:text-2xl md:text-3xl lg:text-4xl">
        Featured portfolio pieces</h2>

    <div class="relative w-[1640px] h-160">
        <div :class="applyTransition ? 'transition-all duration-500' : ''"
            class="absolute w-[136%] grid items-center justify-start grid-flow-col gap-8 py-10 h-full"
            :style="`left: calc(-37% - ${multiplier * 19}%)`">

            <template x-for="slide in slides" :key="slide.index">
                <div x-data="{ expanded: currentSlide === slide.index }" x-init="$watch('currentSlide', value => expanded = value === slide.index)"
                    class="grid gap-4 pb-2 transition-all duration-500 shadow-xl w-70" x-cloak
                    :class="expanded ? 'h-[550px] xs:w-90 grid-rows-open' : 'h-[450px] grid-rows-closed'">
                    <!-- Slide Content -->
                    <div class="flex flex-col overflow-hidden">
                        <div class="overflow-hidden basis-9/10">
                            <img :src="slide.image" :alt="slide.title"
                                class="object-cover object-top w-full h-full">
                        </div>
                        <h3 class="block mt-4 text-sm font-medium tracking-widest text-center uppercase basis-1/10 md:text-base font-main" x-text="slide.title"></h3>
                    </div>
                    <div
                        class="flex flex-col items-center px-6 overflow-hidden md:px-10">
                        <span class="block w-10 h-1 mx-auto mb-6 border-t-2 border-black"></span>
                        <p class="block mb-6" x-text="slide.desc"></p>
                        <a :href="slide.link"
                            class="px-10 mt-auto block py-3 mb-4 w-full cursor-pointer text-xxs text-center tracking-[4px] font-bold font-main text-white uppercase bg-black transition-colors duration-300 border border-black hover:bg-white hover:text-black">
                            Details
                        </a>
                    </div>
                </div>
            </template>


        </div>
    </div>

    <div class="flex items-center gap-6 mx-auto text-sm font-bold w-max font-main">
        <button @click="shiftSlide('prev')" class="w-5 h-5">
            <img src="{{ asset('images/partials/carrette-left.svg') }}" class="w-full h-full" alt="Arrow left" aria-hidden>
        </button>
        <div><span x-text="displayedSlide"></span> / <span x-text="slides.length - 2"></span></div>
        <button @click="shiftSlide('next')" class="w-5 h-5">
            <img src="{{ asset('images/partials/carrette-right.svg') }}" class="w-full h-full" alt="Arrow right" aria-hidden>
        </button>
    </div>

    <x-user.link :is_black="true" :url="''" :class="'mt-10 md:mt-16'">
        SEE ALL PROJECTS
    </x-user.link>


</section>
