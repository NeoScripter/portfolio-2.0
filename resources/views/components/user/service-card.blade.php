@props(['id', 'image' => '', 'alt' => '', 'title' => '', 'deadline' => '', 'desc' => '', 'price' => 0])

<article role="region" aria-labelledby="service-title-{{ $id }}" class="flex flex-col space-y-2 shadow-xl">
    <div class="overflow-hidden h-80">
        <img src="{{ Storage::url($image) }}" alt="{{ $alt }}"
            class="object-cover object-center w-full h-full transition-transform duration-500 hover:scale-110" loading="lazy">
    </div>

    <div class="flex flex-col gap-2 p-6 pt-2 tracking-widest sm:pb-8 basis-2/3">
        <h3 id="service-title-{{ $id }}" class="mb-3 text-2xl font-medium tracking-normal">{{ $title }}</h3>
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/partials/clock1.avif') }}" alt="Clock icon indicating the deadline" class="w-6 h-6">
            <p class="text-xs uppercase font-main">{{ $deadline }}</p>
        </div>
        <p class="flex-1 block tracking-normal xs:text-lg">{{ $desc }}</p>
        <p aria-label="Price starts from" class="mb-auto font-bold font-main">From USD {{ $price }}</p>
        <x-user.button aria_label="Hire me for {{ $title }}" :is_black="false" :class="'mt-4 !w-full !border-black-primary'">
            hire me
        </x-user.button>
    </div>
</article>
