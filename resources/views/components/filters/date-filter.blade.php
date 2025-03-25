<div class="flex items-center space-x-4">
    <!-- Badge for selected filter -->
    <span
        class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800 dark:bg-gray-700 dark:text-gray-200"
    >
        {{ ucfirst(str_replace("_", " ", $currentFilter)) }}
    </span>

    <!-- Dropdown for sorting -->
    <button
        id="dropdownDefaultButton"
        data-dropdown-toggle="dropdown"
        class="text-gray-800 hover:text-white bg-gray-100 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
    >
        <svg
            class="stroke-current fill-white dark:fill-gray-800 mr-2"
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M2.29004 5.90393H17.7067"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                d="M17.7075 14.0961H2.29085"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z"
                fill=""
                stroke=""
                stroke-width="1.5"
            ></path>
            <path
                d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z"
                fill=""
                stroke=""
                stroke-width="1.5"
            ></path>
        </svg>
        Filter
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
                    href="{{
                        route('admin.dashboard')
                    }}?chart_filter_period=last_12_months"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{
                        $currentFilter === 'last_12_months'
                            ? 'bg-blue-100 dark:bg-gray-600'
                            : ''
                    }}"
                >
                    <span class="ml-2">Last 12 Months</span>
                </a>
            </li>
            <li>
                <a
                    href="{{
                        route('admin.dashboard')
                    }}?chart_filter_period=this_year"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{
                        $currentFilter === 'this_year'
                            ? 'bg-blue-100 dark:bg-gray-600'
                            : ''
                    }}"
                >
                    <span class="ml-2">This Year</span>
                </a>
            </li>
            <li>
                <a
                    href="{{
                        route('admin.dashboard')
                    }}?chart_filter_period=last_year"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{
                        $currentFilter === 'last_year'
                            ? 'bg-blue-100 dark:bg-gray-600'
                            : ''
                    }}"
                >
                    <span class="ml-2">Last Year</span>
                </a>
            </li>
            <li>
                <a
                    href="{{
                        route('admin.dashboard')
                    }}?chart_filter_period=last_30_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{
                        $currentFilter === 'last_30_days'
                            ? 'bg-blue-100 dark:bg-gray-600'
                            : ''
                    }}"
                >
                    <span class="ml-2">Last 30 Days</span>
                </a>
            </li>
            <li>
                <a
                    href="{{
                        route('admin.dashboard')
                    }}?chart_filter_period=last_7_days"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{
                        $currentFilter === 'last_7_days'
                            ? 'bg-blue-100 dark:bg-gray-600'
                            : ''
                    }}"
                >
                    <span class="ml-2">Last 7 Days</span>
                </a>
            </li>
            <li>
                <a
                    href="{{
                        route('admin.dashboard')
                    }}?chart_filter_period=this_month"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{
                        $currentFilter === 'this_month'
                            ? 'bg-blue-100 dark:bg-gray-600'
                            : ''
                    }}"
                >
                    <span class="ml-2">This Month</span>
                </a>
            </li>
        </ul>
    </div>
</div>
