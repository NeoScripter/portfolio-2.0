<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    @isset($project)
        <section aria-labelledby="project-title">
            <div class="pb-6 text-white sm:pb-10 md:pb-14 bg-black-primary">

                <div class="px-10 pt-3 mb-4 md:pt-6 sm:mb-6">


                    <span class="block mx-auto mt-3 mb-2 italic tracking-widest text-center md:mt-4 md:text-lg sm:mb-4 w-max"
                        aria-hidden="true">Byte Engine</span>
                    <h2 id="project-title"
                        class="text-2xl font-thin tracking-widest text-center uppercase sm:text-3xl font-main md:text-4xl lg:text-5xl">
                        {{ $project->{'title_' . app()->getLocale()} }}</h2>
                </div>
                <div class="flex flex-wrap items-center justify-center max-w-xl gap-2 mx-auto mb-6 sm:gap-4 xs:w-2/3 sm:mb-6 md:mb-8"
                    aria-label="Technology Stack">

                    @isset($project->stack)
                        @foreach ($project->stack as $item)
                            <div class="px-3 py-1 font-bold tracking-widest text-black uppercase bg-gray-100 text-xxs rounded-2xl font-main"
                                aria-label="Technology: {{ $item }}">
                                {{ $item }}
                            </div>
                        @endforeach
                    @endisset
                </div>

                <figure class="relative mx-auto mb-6 sm:mb-10 md:mb-14 image-loading"
                    style="background-image: url('{{ Storage::url($project->image_tiny) }}');">
                    <div
                        class="absolute inset-0 z-10 bg-black bg-opacity-10 bg-gradient-to-t from-black to-transparent via-black/10">
                    </div>
                    <img loading="lazy" src="{{ Storage::url($project->image) }}"
                        alt="{{ $project->{'image_alt_' . app()->getLocale()} }}"
                        class="object-cover object-top w-full h-full"
                        sizes="(min-width: 90rem) 90rem, (min-width: 75rem) 75rem, (min-width: 48rem) 45rem, 24rem"
                        srcset="{{ Storage::url($project->image_small) }} 400w,
                                        {{ Storage::url($project->image_medium) }} 720w,
                                        {{ Storage::url($project->image) }} 1200w">


                    <figcaption class="sr-only">
                        {{ $project->{'image_alt_' . app()->getLocale()} ?? 'No description available' }}</figcaption>
                </figure>

                <p
                    class="px-5 mx-auto mb-6 text-lg text-center text-balance sm:px-10 sm:max-w-screen-md sm:mb-10 md:mb-14 md:text-xl">
                    {{ $project->{'description_' . app()->getLocale()} }}</p>

                <x-user.link :is_black=false :url="$project->website_link" aria_label="Visit the project website">Go to the
                    website</x-user.link>
            </div>


            <div
                class="gap-24 px-5 pt-10 mx-auto space-y-10 pb-14 md:pt-16 sm:pb-20 md:pb-28 md:space-y-16 sm:px-10 xs:px-8 sm:max-w-screen-sm md:max-w-full md:columns-2">
                @php
                    $image_alts = $project->{'image_content_alt_' . app()->getLocale()};
                    $texts = $project->{'text_content_' . app()->getLocale()};
                    $images = $project->image_content;
                @endphp



                @isset($texts)
                    @foreach ($texts as $index => $image)
                        <div class="font-serif text-lg text-center md:text-xl text-balance">
                            {{ $texts[$index] }}
                        </div>

                        @isset($images[$index])
                            <figure class="max-w-screen-sm mx-auto image-loading"
                                style="background-image: url('{{ Storage::url($images[$index]['tiny']) }}');">
                                <img loading="lazy" src="{{ Storage::url($images[$index]['original']) }}"
                                    alt="{{ $image_alts[$index] ?? '' }}"
                                    class="object-cover object-top w-full h-full rounded-xl"
                                    sizes="(min-width: 90rem) 45rem, (min-width: 75rem) 45rem, (min-width: 48rem) 45rem, 24rem"
                                    srcset="{{ Storage::url($images[$index]['small']) }} 400w,
                                        {{ Storage::url($images[$index]['medium']) }} 720w,
                                        {{ Storage::url($images[$index]['original']) }} 1200w">

                                <figcaption class="sr-only">{{ $image_alts[$index] ?? 'No description available' }}</figcaption>
                            </figure>
                        @endisset
                    @endforeach
                @endisset

            </div>

            <x-user.call-bar />
        </section>
    @endisset

</div>
