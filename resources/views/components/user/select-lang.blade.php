@props(['is_black' => true])

<select onchange="window.location.href = '{{ route('locale', '') }}/' + this.value"
    class="p-0 mb-2 {{$is_black ? 'bg-black-primary' : 'bg-white'}} font-main select-field appearance-none tracking-[2px] text-xs font-regular border-none w-20 block cursor-pointer transition-colors group-hover:text-gray-400 outline-none shadow-none focus-visible:text-gray-400" style="background: {{$is_black ? '#121618' : '#fff'}};">
    <option value="en" {{ App::getLocale() === 'en' ? 'selected' : '' }}>ENGLISH</option>
    <option value="fr" {{ App::getLocale() === 'fr' ? 'selected' : '' }}>FRENCH</option>
</select>
