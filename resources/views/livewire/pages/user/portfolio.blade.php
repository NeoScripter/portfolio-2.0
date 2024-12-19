<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    @isset($projects)
    <section aria-labelledby="projects">
        <h2 id="projects"
            class="mb-2 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-5 font-main xs:text-2xl md:text-3xl lg:text-4xl">
            My portfolio pieces</h2>

        <p class="w-3/5 mx-auto mb-12 text-center sm:mb-20 md:mb-28 xs:text-lg md:text-xl lg:text-2xl">Here are my portfolio pieces</p>

        <div class="grid gap-20 px-8 mx-auto sm:gap-32 sm:px-10 sm:max-w-screen-md">

            @foreach($projects as $index => $project)
                <article class="flex flex-col items-center gap-10 sm:items-start sm:flex-row">
                    <div class="xs:h-160 sm:h-auto md:h-160 sm:flex-1 {{ $index % 2 === 0 ? 'sm:order-2' : '' }}">
                        <img src="{{ Storage::url($project->featured_image)}}" alt="{{ $project->{'image_alt_' . app()->getLocale()} }}" class="object-cover object-top w-full h-full">
                    </div>


                    <div class="sm:flex-1">
                        <h3 class="mb-4 font-bold tracking-widest text-center uppercase md:mx-auto md:w-3/4 mt-14 text-balance font-main">{{ $project->{'title_' . app()->getLocale()} }}</h3>
                        <div class="flex flex-wrap items-center justify-center gap-2 mx-auto mb-6 xs:w-2/3">

                            @foreach ($project->stack as $item)
                                <div class="px-3 py-1 font-bold tracking-widest uppercase bg-gray-100 text-xxs rounded-2xl font-main">
                                    {{ $item }}
                                </div>
                            @endforeach
                        </div>
                        <span class="block w-12 mx-auto my-4 sm:my-6 h-0.5 bg-black"></span>
                        <p class="mb-8 text-lg text-center sm:px-10 sm:mb-10 text-balance">{{ $project->{'description_' . app()->getLocale()} }}</p>

                        <x-user.link :is_black=true :url="route('project', $project->id)" >See the project</x-user.link>

                    </div>
                </article>
            @endforeach

        </div>

        <div class="px-10 mx-auto my-14 md:my-24 sm:max-w-screen-lg">
            {{ $projects->links('pagination::tailwind', ['scrollTo' => true]) }}
        </div>

        <x-user.call-bar/>
    </section>
    @endisset

</div>
