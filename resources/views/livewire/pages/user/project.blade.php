<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    @isset($project)
    <section aria-labelledby="project">
        <div class="xs:h-160 sm:h-auto md:h-160">
            <img src="{{ Storage::url($project->image)}}" alt="{{ $project->{'image_alt_' . app()->getLocale()} }}" class="object-cover object-top w-full h-full">
        </div>

        <x-user.link :is_black=true :url="$project->website_link" >Go to the website</x-user.link>
        <h2 id="project"
            class="mb-2 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-5 font-main xs:text-2xl md:text-3xl lg:text-4xl">
            {{ $project->{'title_' . app()->getLocale()} }}</h2>

        <p class="w-3/5 mx-auto mb-12 text-center sm:mb-20 md:mb-28 xs:text-lg md:text-xl lg:text-2xl">Here are my portfolio pieces</p>

        <div class="grid gap-20 px-8 mx-auto sm:gap-32 sm:px-10 sm:max-w-screen-md">


        </div>

        <x-user.call-bar/>
    </section>
    @endisset

</div>
