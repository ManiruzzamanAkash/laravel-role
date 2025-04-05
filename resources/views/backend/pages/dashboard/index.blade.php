@extends('backend.layouts.app')

@section('title')
Dashboard Page - {{ config('app.name') }}
@endsection

@section('before_vite_build')
<script>
    var userGrowthData = @json($user_growth_data['data']);
    var userGrowthLabels = @json($user_growth_data['labels']);
</script>
@endsection

@section('admin-content')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 space-y-6">
            <div class="grid grid-cols-3 gap-4 md:grid-cols-5 md:gap-6">
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
                >
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800"
                    >
                        <i class="bi bi-people dark:text-white text-2xl"></i>
                    </div>

                    <div class="mt-5 flex items-end justify-between">
                        <div>
                            <span class="text-sm text-gray-500 dark:text-gray-400"
                                >Users</span
                            >
                            <h4
                                class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                            >
                                {{ $total_users }}
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
                        <i class="bi bi-shield-check dark:text-white text-2xl"></i>
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
                        <i class="bi bi-list-check dark:text-white text-2xl"></i>
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
    </div>

    <div class="mt-6">
        <!-- User growth chart. -->
        @include('components.charts.user-growth-chart')
    </div>
</div>
@endsection
