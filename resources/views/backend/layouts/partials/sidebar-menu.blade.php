@php $user = Auth::guard('web')->user(); @endphp

<nav>
    <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
            MENU
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            @if ($user->can('dashboard.view'))
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="menu-item group {{ Route::is('admin.dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}">
                        <i class="bi bi-grid text-xl text-center"></i>
                        <span class="menu-item-text">Dashboard</span>
                    </a>
                </li>
            @endif

            @if ($user->can('role.create') || $user->can('role.view') || $user->can('role.edit') || $user->can('role.delete'))
                <li>
                    <button
                        class="menu-item group w-full text-left {{ Route::is('admin.roles.*') ? 'menu-item-active' : 'menu-item-inactive text-white' }}"
                        type="button" onclick="toggleSubmenu('roles-submenu')">
                        <i class="bi bi-shield-check text-xl text-center"></i>
                        <span class="menu-item-text">Roles & Permissions</span>
                        <i class="bi bi-chevron-down ml-auto"></i>
                    </button>
                    <ul id="roles-submenu"
                        class="submenu {{ Route::is('admin.roles.*') ? '' : 'hidden' }} pl-8 mt-2 space-y-2">
                        @if ($user->can('role.view'))
                            <li>
                                <a href="{{ route('admin.roles.index') }}"
                                    class="block px-4 py-2 rounded-lg {{ Route::is('admin.roles.index') || Route::is('admin.roles.edit') ? 'menu-item-active' : 'menu-item-inactive' }}">
                                    Roles
                                </a>
                            </li>
                        @endif
                        @if ($user->can('role.create'))
                            <li>
                                <a href="{{ route('admin.roles.create') }}"
                                    class="block px-4 py-2 rounded-lg {{ Route::is('admin.roles.create') ? 'menu-item-active' : 'menu-item-inactive' }}">
                                    New Role
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if ($user->can('user.create') || $user->can('user.view') || $user->can('user.edit') || $user->can('user.delete'))
                <li>
                    <button
                        class="menu-item group w-full text-left {{ Route::is('admin.users.*') ? 'menu-item-active' : 'menu-item-inactive text-white' }}"
                        type="button" onclick="toggleSubmenu('users-submenu')">
                        <i class="bi bi-person text-xl text-center"></i>
                        <span class="menu-item-text">Users</span>
                        <i class="bi bi-chevron-down ml-auto"></i>
                    </button>
                    <ul id="users-submenu"
                        class="submenu {{ Route::is('admin.users.*') ? '' : 'hidden' }} pl-8 mt-2 space-y-2">
                        @if ($user->can('user.view'))
                            <li>
                                <a href="{{ route('admin.users.index') }}"
                                    class="block px-4 py-2 rounded-lg {{ Route::is('admin.users.index') || Route::is('admin.users.edit') ? 'menu-item-active' : 'menu-item-inactive' }}">
                                    Users
                                </a>
                            </li>
                        @endif
                        @if ($user->can('user.create'))
                            <li>
                                <a href="{{ route('admin.users.create') }}"
                                    class="block px-4 py-2 rounded-lg {{ Route::is('admin.users.create') ? 'menu-item-active' : 'menu-item-inactive' }}">
                                    New User
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if ($user->can('module.view'))
                <li>
                    <a href="{{ route('admin.modules.index') }}"
                        class="menu-item group {{ Route::is('admin.modules.index') ? 'menu-item-active' : 'menu-item-inactive' }}">
                        <i class="bi bi-box text-xl text-center"></i>
                        <span class="menu-item-text">Modules</span>
                    </a>
                </li>
            @endif

            @if ($user->can('pulse.view'))
                <li>
                    <button class="menu-item group w-full text-left {{ Route::is('actionlog.index') ? 'menu-item-active' : 'menu-item-inactive text-white' }}" type="button"
                        onclick="toggleSubmenu('monitoring-submenu')">
                        <i class="bi bi-activity text-xl text-center"></i>
                        <span class="menu-item-text">Monitoring</span>
                        <i class="bi bi-chevron-down ml-auto"></i>
                    </button>
                    <ul id="monitoring-submenu" class="submenu {{ Route::is('actionlog.index') ? '' : 'hidden' }} pl-8 mt-2 space-y-2">
                        @if ($user->can('pulse.view'))
                            <li>
                                <a href="{{ route('pulse') }}" class="block px-4 py-2 rounded-lg {{ Route::is('pulse') ? 'menu-item-active' : 'menu-item-inactive' }}" >
                                    Laravel Pulse
                                </a>
                            </li>
                        @endif
                        @if ($user->can('actionlog.view'))
                            <li>
                                <a href="{{ route('actionlog.index') }}" class="block px-4 py-2 rounded-lg {{ Route::is('actionlog.index') ? 'menu-item-active' : 'menu-item-inactive' }}" >
                                    Action Log
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>

    <!-- Others Group -->
    <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
            More
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            <!-- Logout Menu Item -->
            <li class="menu-item-inactive rounded-md ">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="menu-item group w-full text-left">
                        <i class="bi bi-box-arrow-right text-xl text-center dark:text-white/90"></i>
                        <span class="menu-item-text dark:text-white/90" :class="sidebarToggle ? 'lg:hidden' : ''">
                            Logout
                        </span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<script>
    function toggleSubmenu(submenuId) {
        const submenu = document.getElementById(submenuId);
        submenu.classList.toggle('hidden');
    }
</script>
