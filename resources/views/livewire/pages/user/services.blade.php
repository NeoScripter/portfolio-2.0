<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    @isset($services)
        <section>
            <h2
                class="mb-2 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-5 font-main xs:text-2xl md:text-3xl lg:text-4xl">
                Services and prices</h2>

            <p class="w-4/5 mx-auto mb-5 text-center sm:mb-12 md:mb-20 xs:text-lg md:text-xl lg:text-2xl">{{__('pages.services.title')}}</p>

            <div class="grid gap-6 px-4 mx-auto sm:px-10 sm:max-w-screen-lg xs:gap-10 grid-cols-auto-fit-240 md:grid-cols-4">

                @foreach ($services as $service)
                    <x-user.service-card :image="$service->image" :alt="''" :title="$service->title_en" :deadline="$service->deadline_en"
                        :desc="Str::words($service->description_en, 40)" :price="$service->min_price" />
                @endforeach

            </div>
            <div class="px-10 mx-auto mt-5 md:mt-14 sm:max-w-screen-lg">
                {{ $services->links(data: ['scrollTo' => false]) }}
            </div>


        </section>
    @endisset

</div>
