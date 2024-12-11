@props(['index' => 0, 'image' => '', 'title' => '', 'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias dolor autem hic sapiente iure quaerat. Blanditiis, aspernatur. Molestiae, rerum quas! Voluptas quis officia dolorem nostrum itaque veniam hic accusantium magnam.', 'link' => ''])

<div x-data="{ expanded: currentSlide === @json($index) }"
x-init="$watch('currentSlide', value => expanded = value === @json($index))"
class="flex flex-col items-center gap-4 pb-6 shadow-xl w-70"
    x-cloak :class="!expanded ? 'h-4/5' : 'w-90 h-full'">
    <div x-show="expanded" x-collapse.min.400px.duration.500ms>
        <img src="{{ $image }}" alt="" class="object-cover object-center w-full h-full">
    </div>

    <h3 class="mt-2 font-medium tracking-widest uppercase font-main">{{ $title }}</h3>

    <div x-show="expanded" x-collapse.duration.500ms class="px-6 md:px-10">
        <span class="block w-10 h-1 mx-auto mb-6 border-t-2 border-black"></span>
        <p class="mb-6">{{ $desc }}</p>
        <a href="{{ $link }}"
            class="px-10 block py-3 w-full text-xxs text-center tracking-[4px] font-bold mb-4 font-main text-white uppercase bg-black transition-colors duration-300 border border-black hover:bg-white hover:text-black">Details</a>
    </div>
</div>
