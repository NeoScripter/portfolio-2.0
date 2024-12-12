@props(['is_black' => false, 'class' => ''])

<button class="{{ $class }} px-10 py-3 text-xxs block mx-auto w-max tracking-[4px] font-bold font-main transition-colors uppercase duration-300 border {{ $is_black ? 'text-white bg-black-primary border-white hover:bg-white hover:text-black-primary' : 'text-black-primary bg-white border-black-primary hover:bg-black-primary hover:text-white'}}">
    {{ $slot }}
</button>
