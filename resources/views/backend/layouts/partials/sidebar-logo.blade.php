<!-- Sidebar -->
<aside
    :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-10 flex h-screen w-[290px] flex-col overflow-y-hidden border-r bg-gray-800 px-5 border-gray-800 dark:bg-gray-900 lg:static lg:translate-x-0"
>
    <!-- Sidebar Header -->
    <div
        :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="justify-center flex items-center gap-2 pt-4 sidebar-header pb-4"
    >
        <a href="{{ route('admin.dashboard') }}">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img
                    class="dark:hidden h-20"
                    src="/images/logo/lara-admin-dark.png"
                    alt="Logo"
                />
                <img
                    class="hidden dark:block h-20"
                    src="/images/logo/lara-admin-dark.png"
                    alt="Logo"
                />
            </span>
            <img
                class="logo-icon w-20 lg:w-12"
                :class="sidebarToggle ? 'lg:block' : 'hidden'"
                src="/images/logo/icon.png"
                alt="Logo"
            />
        </a>
    </div>
    <!-- End Sidebar Header -->

    <div
        class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar"
    >
        @include('backend.layouts.partials.sidebar-menu')
    </div>
</aside>
<!-- End Sidebar -->
