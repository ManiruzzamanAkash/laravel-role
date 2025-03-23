@php
    $usr = Auth::guard('admin')->user();
@endphp

<nav x-data="{selected: $persist('Dashboard')}">
    <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
            <span
                class="menu-group-title"
                :class="sidebarToggle ? 'lg:hidden' : ''"
            >
                MENU
            </span>

            <i class="bi bi-three-dots text-xl text-center"
                :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            ></i>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            @if ($usr->can('dashboard.view'))
            <li>
                <a
                    href="{{ route('admin.dashboard') }}"
                    @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard'); window.location.href = '{{ route('admin.dashboard') }}'"
                    class="menu-item group"
                    :class=" (selected === 'Dashboard') ? 'menu-item-active' : 'menu-item-inactive'"
                >
                    <i class="bi bi-grid text-xl text-center"></i>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''"
                    >
                        Dashboard
                    </span>
                </a>
            </li>
            @endif

            @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Roles' ? '':'Roles')"
                    class="menu-item group"
                    :class=" (selected === 'Roles') ? 'menu-item-active' : 'menu-item-inactive'"
                >
                    <svg
                        :class="(selected === 'Roles') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                            fill=""
                        />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''"
                    >
                        Roles & Permissions
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Roles') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                            stroke=""
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>

                <!-- Dropdown Menu Start -->
                <div
                    class="overflow-hidden transform translate"
                    :class="(selected === 'Roles') ? 'block' :'hidden'"
                >
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9"
                    >
                        @if ($usr->can('role.view'))
                        <li>
                            <a
                                href="{{ route('admin.roles.index') }}"
                                class="menu-dropdown-item group {{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                            >
                                Roles
                            </a>
                        </li>
                        @endif
                        @if ($usr->can('role.create'))
                        <li>
                            <a
                                href="{{ route('admin.roles.create') }}"
                                class="menu-dropdown-item group {{ Route::is('admin.roles.create')  ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                            >
                                New Role
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            @endif

            @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
            <li>
                <a href="#" @click.prevent="selected = (selected === 'Users' ? '' : 'Users')" class="menu-item group" :class="(selected === 'Users') ? 'menu-item-active' : 'menu-item-inactive'">
                    <i class="bi bi-person text-xl text-center"></i>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''"
                    >
                        Users
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Roles') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                            stroke=""
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>
                <div class="overflow-hidden transform translate" :class="(selected === 'Users') ? 'block' : 'hidden'">
                    <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                        @if ($usr->can('admin.view'))
                        <li>
                            <a href="{{ route('admin.admins.index') }}" class="menu-dropdown-item group {{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                Users
                            </a>
                        </li>
                        @endif
                        @if ($usr->can('admin.create'))
                        <li>
                            <a href="{{ route('admin.admins.create') }}" class="menu-dropdown-item group {{ Route::is('admin.admins.create') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}">
                                New User
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>

    <!-- Others Group -->
    <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
            <span
                class="menu-group-title"
                :class="sidebarToggle ? 'lg:hidden' : ''"
            >
                others
            </span>

            <svg
                :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                class="mx-auto fill-current menu-group-icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                    fill=""
                />
            </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            <!-- Menu Item Charts -->
            <li>
                <a
                    href="#"
                    @click.prevent="selected = (selected === 'Charts' ? '':'Charts')"
                    class="menu-item group"
                    :class="(selected === 'Charts') || (page === 'lineChart' || page === 'barChart' || page === 'pieChart') ? 'menu-item-active' : 'menu-item-inactive'"
                >
                    <svg
                        :class="(selected === 'Charts') || (page === 'lineChart' || page === 'barChart' || page === 'pieChart') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 2C11.5858 2 11.25 2.33579 11.25 2.75V12C11.25 12.4142 11.5858 12.75 12 12.75H21.25C21.6642 12.75 22 12.4142 22 12C22 6.47715 17.5228 2 12 2ZM12.75 11.25V3.53263C13.2645 3.57761 13.7659 3.66843 14.25 3.80098V3.80099C15.6929 4.19606 16.9827 4.96184 18.0104 5.98959C19.0382 7.01734 19.8039 8.30707 20.199 9.75C20.3316 10.2341 20.4224 10.7355 20.4674 11.25H12.75ZM2 12C2 7.25083 5.31065 3.27489 9.75 2.25415V3.80099C6.14748 4.78734 3.5 8.0845 3.5 12C3.5 16.6944 7.30558 20.5 12 20.5C15.9155 20.5 19.2127 17.8525 20.199 14.25H21.7459C20.7251 18.6894 16.7492 22 12 22C6.47715 22 2 17.5229 2 12Z"
                            fill=""
                        />
                    </svg>

                    <span
                        class="menu-item-text"
                        :class="sidebarToggle ? 'lg:hidden' : ''"
                    >
                        Charts
                    </span>

                    <svg
                        class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                        :class="[(selected === 'Charts') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                            stroke=""
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>

                <!-- Dropdown Menu Start -->
                <div
                    class="overflow-hidden transform translate"
                    :class="(selected === 'Charts') ? 'block' :'hidden'"
                >
                    <ul
                        :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                        class="flex flex-col gap-1 mt-2 menu-dropdown pl-9"
                    >
                        <li>
                            <a
                                href="line-chart.html"
                                class="menu-dropdown-item group"
                                :class="page === 'lineChart' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                            >
                                Line Chart
                            </a>
                        </li>
                        <li>
                            <a
                                href="bar-chart.html"
                                class="menu-dropdown-item group"
                                :class="page === 'barChart' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                            >
                                Bar Chart
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dropdown Menu End -->
            </li>
            <!-- Menu Item Charts -->
        </ul>
    </div>
</nav>
<!-- Sidebar Menu -->
