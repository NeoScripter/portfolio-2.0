@props(['inverted' => false, 'large' => false, 'alt' => 'Some description', 'image' => '', 'shifted_right' => false, 'shifted_top' => true, 'gap' => true])

<div class="flex flex-col items-center justify-center border border-gray-300 rounded aspect-square transition-shadow hover:shadow-lg {{ $gap ? 'gap-2' : ''}}" role="listitem">
    <img src="{{ $image }}" alt="{{ $alt }}" class="{{ $large ? 'w-14 h-14' : 'w-8 h-8'}} {{ $inverted ? 'invert' : ''}} {{ $shifted_right ? 'mr-1' : ''}} {{ $shifted_top ? 'mt-2' : ''}}">
    <span class="uppercase text-xxs font-main">
        {{ $slot }}
    </span>
</div>
