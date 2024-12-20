<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left text-gray-900 bg-white rtl:text-right dark:text-white dark:bg-gray-800">
                            Welcome, Admin!
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Here are all the recent
                                visitors of your website</p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    IP Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Method
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Visited At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitors as $visitor)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $visitor->ip_address }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $visitor->method }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $visitor->url }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $visitor->visited_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{ $visitors->links() }}
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
