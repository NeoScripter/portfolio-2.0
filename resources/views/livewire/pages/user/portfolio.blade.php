<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">


    <section aria-labelledby="projects">
        <h2 id="projects"
            class="mb-2 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-5 font-main xs:text-2xl md:text-3xl lg:text-4xl">
            My portfolio pieces</h2>

        <p class="w-3/5 mx-auto mb-6 text-center sm:mb-10 md:mb-14 xs:text-lg md:text-xl lg:text-2xl">Here are my
            portfolio pieces</p>

        <div class="px-5 mx-auto mb-6 sm:max-w-screen-md sm:mb-10 md:mb-14">
            <form wire:submit.prevent class="flex items-center max-w-md mx-auto" aria-labelledby="search-form-title">

                <label for="simple-search" class="sr-only" id="search-form-title">Search Projects</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-lg rounded-sm focus:ring-black-primary focus:border-black-primary block w-full ps-10 p-2.5"
                        placeholder="Search project..." wire:model.live.debounce.200="searchText" />
                </div>
                <button type="submit" class="sr-only" aria-label="Submit search">
            </form>
        </div>

        @isset($projects)
            <div class="grid gap-20 px-8 mx-auto sm:gap-32 sm:px-10 sm:max-w-screen-md">

                @foreach ($projects as $index => $project)
                    <article x-data="{ loading: true }" x-init="loading = !$el.querySelector('img').complete;
                    $el.querySelector('img').addEventListener('load', () => loading = false);"
                        class="flex flex-col items-center gap-10 sm:items-start sm:flex-row">
                        <div class="xs:h-160 sm:h-auto md:h-160 sm:flex-1 image-loading {{ $index % 2 === 0 ? 'sm:order-2' : '' }}"
                            :class="loading ? '' : 'image-loaded'"
                            style="background-image: url('{{ Storage::url($project->featured_image_tiny) }}');">
                            <img @load="loading = false" loading="lazy"
                                src="{{ Storage::url($project->featured_image_medium) }}"
                                alt="{{ $project->{'image_alt_' . app()->getLocale()} }}"
                                sizes="(min-width: 90rem) 45rem, (min-width: 75rem) 45rem, (min-width: 48rem) 45rem, 24rem"
                                srcset="{{ Storage::url($project->featured_image_small) }} 400w,
                                        {{ Storage::url($project->featured_image_medium) }} 720w,
                                        {{ Storage::url($project->featured_image) }} 1200w">
                        </div>


                        <div class="sm:flex-1">
                            <h3
                                class="mb-4 font-bold tracking-widest text-center uppercase md:mx-auto md:w-3/4 mt-14 text-balance font-main">
                                {{ $project->{'title_' . app()->getLocale()} }}</h3>
                            <div class="flex flex-wrap items-center justify-center gap-2 mx-auto mb-6 xs:w-2/3">

                                @isset($project->stack)
                                    @foreach ($project->stack as $item)
                                        <div
                                            class="px-3 py-1 font-bold tracking-widest uppercase bg-gray-100 text-xxs rounded-2xl font-main">
                                            {{ $item }}
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                            <span class="block w-12 mx-auto my-4 sm:my-6 h-0.5 bg-black"></span>
                            <p class="mb-8 text-lg text-center sm:px-10 sm:mb-10 text-balance">
                                {{ $project->{'description_' . app()->getLocale()} }}</p>

                            <x-user.link :is_black=true :url="route('project', $project->id)">See the project</x-user.link>

                        </div>
                    </article>
                @endforeach

            </div>
        @endisset

        <div class="px-10 mx-auto my-14 md:my-24 sm:max-w-screen-lg">
            {{ $projects->links() }}
        </div>

        <x-user.call-bar />
    </section>


</div>
