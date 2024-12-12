@props(['image' => '', 'alt' => '', 'title' => '', 'deadline' => '', 'desc' => '', 'price' => 0])

<div class="flex flex-col space-y-2 shadow-xl">
    <div class="overflow-hidden h-80">
        <img src="{{ Storage::url($image) }}" alt="{{ $alt }}"
            class="object-cover object-center w-full h-full transition-transform duration-500 hover:scale-110">
    </div>

    <div class="flex flex-col gap-2 p-6 pt-2 tracking-widest basis-1/2">
        <h3 class="mb-3 text-2xl font-medium tracking-normal">{{ $title }}</h3>
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/partials/clock1.avif') }}" alt="" class="w-6 h-6">
            <p class="text-xs uppercase font-main">{{ $deadline }}</p>
        </div>
        <p class="flex-1 block tracking-normal xs:text-lg">{{ $desc }}</p>
        <p class="font-bold font-main">From USD {{ $price }}</p>
        <x-user.button :is_black="false" :class="'mt-4'">
            get a free consultation
        </x-user.button>
    </div>
</div>
