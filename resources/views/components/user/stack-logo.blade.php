@props(['inverted' => false, 'alt' => 'Some description', 'image' => '', 'gap' => true])

<div class="flex flex-col items-center justify-center border border-gray-300 rounded aspect-square transition-shadow hover:shadow-lg {{ $gap ? 'gap-2' : ''}}" role="listitem">
    <img src="{{ $image }}" alt="{{ $alt }}" class="w-8 h-8 {{ $inverted ? 'invert' : ''}} mt-2">
    <span class="uppercase text-xxs font-main">
        {{ $slot }}
    </span>
</div>
