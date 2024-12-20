<div class="pb-12 space-y-12 sm:space-y-16 md:space-y-20 md:pb-16">

    @isset($services)
        <section aria-labelledby="services">
            <h2 id="services"
                class="mb-2 text-lg font-thin tracking-widest text-center uppercase md:pt-14 sm:mb-5 font-main xs:text-2xl md:text-3xl lg:text-4xl">
                Services and prices</h2>

            <p class="w-4/5 mx-auto mb-5 text-center sm:mb-12 md:mb-20 xs:text-lg md:text-xl lg:text-2xl">{{__('pages.services.title')}}</p>

            <div class="grid gap-6 px-4 mx-auto sm:px-10 sm:max-w-screen-lg xs:gap-10 grid-cols-auto-fit-240 md:grid-cols-4">

                @foreach ($services as $service)
                    <x-user.service-card :id="$service->id" :image="$service->image" :image_medium="$service->image_medium" :image_small="$service->image_small" :image_tiny="$service->image_tiny" :alt="''" :title="$service->title_en" :deadline="$service->deadline_en"
                        :desc="Str::words($service->description_en, 40)" :price="$service->min_price" />
                @endforeach

            </div>
            <div class="px-10 mx-auto mt-5 md:mt-14 sm:max-w-screen-lg">
                {{ $services->links('pagination::tailwind', ['scrollTo' => false]) }}
            </div>


        </section>
    @endisset

    <section>
        <h2 class="mb-5 text-lg font-thin tracking-widest text-center uppercase sm:mb-12 md:mb-20 md:pt-14 font-main xs:text-2xl md:text-3xl lg:text-4xl">
                FAQ</h2>

        <div class="px-4 mx-auto mb-10 sm:mb-16 md:mb-24 sm:px-10 sm:max-w-screen-lg">
            @isset($faqs)
                @foreach ($faqs as $faq)
                    <details class="px-2 overflow-hidden border-t md:px-4 border-black-primary" name="faq">
                        <summary class="flex items-start justify-between gap-2 py-6 text-sm font-medium tracking-widest uppercase cursor-pointer select-none md:py-8 md:gap-4 sm:text-base no-marker font-main">{{ $faq['question'] }}</summary>
                        <p class="pb-6 text-lg md:pb-8">{{ $faq['answer'] }}</p>
                    </details>
                @endforeach
            @endisset
        </div>

        <x-user.call-bar/>

    </section>

</div>
