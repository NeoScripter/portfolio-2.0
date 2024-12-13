@props(['top' => rand(15, 85), 'left' => rand(10, 90), 'name' => '', 'image' => null, 'review' => ''])

<div class="absolute p-4 space-y-2 transition-all duration-500 -translate-x-1/2 -translate-y-1/2 bg-white shadow-xl w-70 hover:z-10 hover:scale-125" style="top: {{$top}}%; left: {{$left}}%;">
    <div class="flex items-center gap-3">
        @if ($image)
            <img src="{{ asset('images/reviews/' . $image . '.webp') }}" alt="{{ $name }}" class="w-8 h-8 rounded">
        @else
            <img src="{{ asset('images/home/avatar.png') }}" alt="{{ $name }}" class="w-8 h-8">
        @endif
        <p class="text-2xl font-medium tracking-widest uppercase font-main">{{ $name }}</p>
    </div>
    <div class="w-5 h-5"><img src="{{ asset('images/home/quote.svg') }}" alt="" class="w-full h-full"></div>
    <p class="text-lg">{{ $review }}</p>
</div>
