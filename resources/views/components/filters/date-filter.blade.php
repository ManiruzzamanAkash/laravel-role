<div class="flex items-center space-x-4">
    <!-- Badge for selected filter -->
    <span
        class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800 dark:bg-gray-700 dark:text-gray-200"
    >
        {{ ucfirst(str_replace('_', ' ', $currentFilter)) }}
    </span>

    <!-- Dropdown for sorting -->
    <button
        id="dropdownDefaultButton"
        data-dropdown-toggle="dropdown"
        class="text-gray-800 hover:text-white bg-gray-100 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
    >
        Filter by
        <i class="bi bi-chevron-down ml-2"></i>
    </button>

    <!-- Dropdown menu -->
    <div
        id="dropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700"
    >
        <ul
            class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownDefaultButton"
        >
            <li>
                <a
                    href="{{ route('admin.dashboard') }}?chart_filter_period=last_12_months"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $currentFilter === 'last_12_months' ? 'bg-blue-100 dark:bg-gray-600' : '' }}"
                >
                    <span class="ml-2">Last 12 Months</span>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}?chart_filter_period=this_year"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $currentFilter === 'this_year' ? 'bg-blue-100 dark:bg-gray-600' : '' }}"
                >
                    <span class="ml-2">This Year</span>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}?chart_filter_period=last_year"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $currentFilter === 'last_year' ? 'bg-blue-100 dark:bg-gray-600' : '' }}"
                >
                    <span class="ml-2">Last Year</span>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}?chart_filter_period=last_30_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $currentFilter === 'last_30_days' ? 'bg-blue-100 dark:bg-gray-600' : '' }}"
                >
                    <span class="ml-2">Last 30 Days</span>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}?chart_filter_period=last_7_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $currentFilter === 'last_7_days' ? 'bg-blue-100 dark:bg-gray-600' : '' }}"
                >
                    <span class="ml-2">Last 7 Days</span>
                </a>
            </li>
            <li>
                <a
                    href="{{ route('admin.dashboard') }}?chart_filter_period=this_month"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $currentFilter === 'this_month' ? 'bg-blue-100 dark:bg-gray-600' : '' }}"
                >
                    <span class="ml-2">This Month</span>
                </a>
            </li>
        </ul>
    </div>
</div>
