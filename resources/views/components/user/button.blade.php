@props(['is_black' => false, 'class' => '', 'aria_label' => '', 'opensPopup' => false])

<button {{ $opensPopup ? 'x-data @click=$dispatch(\'open-form\')' : '' }}  aria-label="{{$aria_label}}" class="{{ $class }} px-10 py-3 text-xxs block mx-auto w-max tracking-[4px] font-bold font-main transition-colors uppercase duration-300 border {{ $is_black ? 'text-white bg-black-primary border-black-primary hover:bg-white hover:text-black-primary' : 'text-black-primary bg-white border-white hover:bg-black-primary hover:text-white'}}">
    {{ $slot }}
</button>
