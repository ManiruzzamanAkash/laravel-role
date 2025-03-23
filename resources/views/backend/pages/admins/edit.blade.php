@extends('backend.layouts.app')

@section('title')
User Edit - LaraAdmin
@endsection

@section('admin-content')

<div class="p-4 mx-auto max-w-7xl md:p-6">
    <div x-data="{ pageName: `Edit User`}">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white" x-text="pageName">Edit User</h2>
            <nav>
                <ol class="flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1.5">
                            Home
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.admins.index') }}" class="inline-flex items-center gap-1.5">
                            Users
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li class="text-gray-800 dark:text-white" x-text="pageName">Edit User</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            <div class="px-5 py-2.5 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white">Edit Admin - {{ $admin->name }}</h3>
            </div>
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                @include('backend.layouts.partials.messages')
                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" class="space-y-6">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">User Name</label>
                            <input type="text" name="name" id="name" required value="{{ $admin->name }}" placeholder="Enter Name" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">User Email</label>
                            <input type="email" name="email" id="email" required value="{{ $admin->email }}" placeholder="Enter Email" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Password (Optional)</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Confirm Password (Optional)</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label for="roles" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Assign Roles</label>
                            <div class="space-y-2">
                                @foreach ($roles as $role)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'checked' : '' }} class="h-4 w-4 text-brand-500 border-gray-300 rounded focus:ring-brand-400 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-brand-500">
                                        <label for="role_{{ $role->id }}" class="ml-2 text-sm text-gray-700 dark:text-gray-400">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Admin Username</label>
                            <input type="text" name="username" id="username" required value="{{ $admin->username }}" placeholder="Enter Username" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-4">
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-brand-500 rounded-lg hover:bg-brand-600">Save</button>
                        <a href="{{ route('admin.admins.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection