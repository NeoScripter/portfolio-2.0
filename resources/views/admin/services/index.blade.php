<section>
    <div>
        <h2 class="flex flex-wrap items-center justify-between gap-4 text-lg font-medium text-gray-900">
            All services

            <x-admin.search-form :action="'/admin/services/'" placeholder="Find a service..." />
        </h2>
    </div>

    <div class="mt-4 space-y-6">

        @if (isset($services))
            @if ($services->isNotEmpty())
                @foreach ($services as $service)
                    <hr>
                    <div>
                        <div>
                            <p class="block mb-2 font-bold text-black uppercase font-sm text-md">{{ $service->title_en }}</p>
                        </div>
                        @if ($service->image)
                            <div>
                                <figure class="relative max-w-sm mb-1">
                                    <img class="rounded-lg max-w-48" src="{{ Storage::url($service->image) }}"
                                        alt="service's image">
                                </figure>
                            </div>
                        @endif

                        <x-admin.link
                            href="{{ route('admin.service.edit', $service) }}">{{ __('Edit') }}</x-admin.link>
                    </div>
                @endforeach
            @else
                <p class="no-managers-message">No services found</p>
            @endif

            {{ $services->links() }}
        @else
            <p class="no-managers-message">No services</p>
        @endif

    </div>
</section>

@if (session('status') === 'success')
    <div class="fixed flex items-center p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-max left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif