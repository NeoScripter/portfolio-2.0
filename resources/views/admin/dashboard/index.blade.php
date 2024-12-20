<table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
    <caption
        class="p-5 pt-0 text-lg font-semibold text-left text-gray-900 bg-white rtl:text-right dark:text-white dark:bg-gray-800">
        Welcome, Admin!
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Here are all the recent
            visitors of your website</p>
    </caption>
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Today
            </th>
            <th scope="col" class="px-6 py-3">
                Last week
            </th>
            <th scope="col" class="px-6 py-3">
                Last month
            </th>
            <th scope="col" class="px-6 py-3">
                All
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $visitors->all_time }}
            </th>
            <td class="px-6 py-4">
                {{ $visitors->today }}
            </td>
            <td class="px-6 py-4">
                {{ $visitors->last_week }}
            </td>
            <td class="px-6 py-4">
                {{ $visitors->last_month }}
            </td>
        </tr>
    </tbody>

</table>
