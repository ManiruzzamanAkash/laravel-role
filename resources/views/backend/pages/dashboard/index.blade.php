@extends('backend.layouts.app')

@section('title')
Dashboard Page - Admin Panel
@endsection

@section('admin-content')
<div class="col-span-12 space-y-6">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6">
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
        >
            <div
                class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800"
            >
                <i class="bi bi-people"></i>
            </div>

            <div class="mt-5 flex items-end justify-between">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400"
                        >Users</span
                    >
                    <h4
                        class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                    >
                        {{ $total_admins }}
                    </h4>
                </div>
            </div>
        </div>
        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
        >
            <div
                class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800"
            >
                <i class="bi bi-shield-check"></i>
            </div>

            <div class="mt-5 flex items-end justify-between">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        Roles
                    </span>
                    <h4
                        class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                    >
                        {{ $total_roles }}
                    </h4>
                </div>
            </div>
        </div>

        <div
            class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
        >
            <div
                class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800"
            >
                <i class="bi bi-shield"></i>
            </div>

            <div class="mt-5 flex items-end justify-between">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        Permissions
                    </span>
                    <h4
                        class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                    >
                        {{ $total_permissions }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection