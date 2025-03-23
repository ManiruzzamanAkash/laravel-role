@extends('backend.layouts.app')

@section('title')
    {{ __('Users - Admin Panel') }}
@endsection

@section('admin-content')

<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div x-data="{ pageName: 'Users' }">
        <!-- Page Header -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Users</h2>
            <nav>
                <ol class="flex items-center gap-1.5">
                    <li>
                        <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="{{ route('admin.dashboard') }}">
                            Home
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName">Users</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Users Table -->
    <div class="space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5 flex justify-between items-center">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Users</h3>

                @include('backend.partials.search-form', [
                    'placeholder' => __('Search by name or email'),
                ])

                @if (auth()->user()->can('user.edit'))
                    <a href="{{ route('admin.users.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="bi bi-plus-circle mr-2"></i>
                        {{ __('New User') }}
                    </a>
                @endif
            </div>
            <div class="p-3 space-y-3 border-t border-gray-100 dark:border-gray-800 sm:p-3 overflow-x-auto">
                @include('backend.layouts.partials.messages')
                <table id="dataTable" class="w-full dark:text-gray-400">
                    <thead class="bg-light text-capitalize">
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <th width="5%">{{ __('Sl') }}</th>
                            <th width="15%">{{ __('Name') }}</th>
                            <th width="10%">{{ __('Email') }}</th>
                            <th width="30%">{{ __('Roles') }}</th>
                            <th width="15%">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $admin)
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <td class="px-5 py-4 sm:px-6">{{ $loop->index + 1 }}</td>
                                <td class="px-5 py-4 sm:px-6 flex items-center md:min-w-[200px]">
                                    <img src="{{ $admin->getGravatarUrl(40) }}" alt="{{ $admin->name }}" class="w-10 h-10 rounded-full mr-3">
                                    {{ $admin->name }}
                                </td>
                                <td class="px-5 py-4 sm:px-6">{{ $admin->email }}</td>
                                <td class="px-5 py-4 sm:px-6 text-center">
                                    @foreach ($admin->roles as $role)
                                        <span class="capitalize inline-flex items-center justify-center px-2 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="flex px-5 py-4 sm:px-6 text-center">
                                    @if (auth()->user()->can('user.edit'))
                                        <a href="{{ route('admin.users.edit', $admin->id) }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            <i class="ml-2 bi bi-pencil text-sm"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->can('user.delete'))
                                        <a href="javascript:void(0);" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form-{{ $admin->id }}').submit(); }" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            <i class="ml-2 bi bi-trash text-sm"></i>
                                        </a>
                                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.users.destroy', $admin->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <p class="text-gray-500 dark:text-gray-400">{{ __('No users found') }}</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('dataTable')) {
            new DataTable('#dataTable', {
                responsive: true,
                autoWidth: false, // Ensure columns adjust properly
                columnDefs: [
                    { targets: 'no-sort', orderable: false } // Add this if you have non-sortable columns
                ]
            });
        }
    });
</script>
@endsection