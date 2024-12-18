<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    @isset($project)
        <section aria-labelledby="project-title">
            <div class="pb-6 text-white sm:pb-10 md:pb-14 bg-black-primary">

                <div class="px-10 pt-3 mb-4 md:pt-6 sm:mb-6">


                    <span class="block mx-auto mt-3 mb-2 italic tracking-widest text-center md:mt-4 md:text-lg sm:mb-4 w-max" aria-hidden="true">Byte Engine</span>
                    <h2 id="project-title"
                        class="text-2xl font-thin tracking-widest text-center uppercase sm:text-3xl font-main md:text-4xl lg:text-5xl">
                        {{ $project->{'title_' . app()->getLocale()} }}</h2>
                </div>
                <div class="flex flex-wrap items-center justify-center max-w-xl gap-2 mx-auto mb-6 sm:gap-4 xs:w-2/3 sm:mb-6 md:mb-8" aria-label="Technology Stack">

                    @foreach ($project->stack as $item)
                        <div
                            class="px-3 py-1 font-bold tracking-widest text-black uppercase bg-gray-100 text-xxs rounded-2xl font-main sm:text-xs"
                            aria-label="Technology: {{ $item }}">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
                <figure class="relative mx-auto mb-6 sm:mb-10 md:mb-14">
                    <div
                        class="absolute inset-0 z-10 bg-black bg-opacity-10 bg-gradient-to-t from-black to-transparent via-black/10">
                    </div>
                    <img src="{{ Storage::url($project->image) }}" alt="{{ $project->{'image_alt_' . app()->getLocale()} }}"
                        class="object-cover object-top w-full h-full">
                    <figcaption class="sr-only">{{ $project->{'image_alt_' . app()->getLocale()} }}</figcaption>
                </figure>

                <p
                    class="px-5 mx-auto mb-6 text-lg text-center text-balance sm:px-10 sm:max-w-screen-md sm:mb-10 md:mb-14 md:text-xl">
                    {{ $project->{'description_' . app()->getLocale()} }}</p>

                <x-user.link :is_black=false :url="$project->website_link" aria_label="Visit the project website">Go to the website</x-user.link>
            </div>


            <div
                class="px-5 pt-10 mx-auto space-y-10 pb-14 md:pt-14 sm:pb-20 md:pb-26 md:space-y-14 sm:px-10 xs:px-8 sm:max-w-screen-md">
                @php
                    $image_alts = $project->{'image_content_alt_' . app()->getLocale()};
                    $texts = $project->{'text_content_' . app()->getLocale()};
                    $images = $project->image_content;
                @endphp


                @foreach ($texts as $index => $image)
                    <div class="text-lg md:text-xl text-balance">
                        {!! $texts[$index] !!}
                    </div>

                    @isset($images[$index])
                        <figure>
                            <img src="{{ Storage::url($images[$index]) }}" alt="{{ $image_alts[$index] }}"
                                class="object-cover object-top w-full h-full rounded-xl" loading="lazy">
                            <figcaption class="sr-only">{{ $image_alts[$index] }}</figcaption>
                        </figure>
                    @endisset
                @endforeach

            </div>

            <x-user.call-bar />
        </section>
    @endisset

</div>
