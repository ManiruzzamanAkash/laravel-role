@extends('backend.layouts.app')

@section('title')
    {{ __('Action Logs - Admin Panel') }}
@endsection

@section('admin-content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div x-data="{ pageName: 'Action Logs' }">
            <!-- Page Header -->
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Action Logs</h2>
                <nav>
                    <ol class="flex items-center gap-1.5">
                        <li>
                            <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                href="{{ route('admin.dashboard') }}">
                                Home
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                        <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName">Action Logs</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Action Logs Table -->
        <div class="space-y-6 mt-8">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Action Logs</h3>
                </div>
                <div class="p-3 space-y-3 border-t border-gray-100 dark:border-gray-800 sm:p-3 overflow-x-auto">
                    <table id="actionLogsTable" class="w-full dark:text-gray-400">
                        <thead class="bg-light text-capitalize">
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <th class="bg-gray-50 dark:bg-gray-800 dark:text-white px-5 py-4 sm:px-6 text-left">
                                    {{ __('Sl') }}</th>
                                <th class="bg-gray-50 dark:bg-gray-800 dark:text-white px-5 py-4 sm:px-6 text-left">
                                    {{ __('Type') }}</th>
                                <th class="bg-gray-50 dark:bg-gray-800 dark:text-white px-5 py-4 sm:px-6 text-left">
                                    {{ __('Title') }}</th>
                                <th class="bg-gray-50 dark:bg-gray-800 dark:text-white px-5 py-4 sm:px-6 text-left">
                                    {{ __('Action By') }}</th>
                                <th class="bg-gray-50 dark:bg-gray-800 dark:text-white px-5 py-4 sm:px-6 text-left">
                                    {{ __('Data') }}</th>
                                <th class="bg-gray-50 dark:bg-gray-800 dark:text-white px-5 py-4 sm:px-6 text-left">
                                    {{ __('Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($actionLogs as $log)
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <td class="px-5 py-4 sm:px-6 text-left">{{ $loop->index + 1 }}</td>
                                    <td class="px-5 py-4 sm:px-6 text-left">{{ $log->type }}</td>
                                    <td class="px-5 py-4 sm:px-6 text-left">{{ $log->title }}</td>
                                    <td class="px-5 py-4 sm:px-6 text-left">{{ $log->action_by }}</td>
                                    <td class="px-5 py-4 sm:px-6 text-left">
                                        <!-- Button to open the modal -->
                                        <button id="expand-btn-{{ $log->id }}" class="text-blue-500 text-sm mt-2" data-modal-target="json-modal-{{ $log->id }}" data-modal-toggle="json-modal-{{ $log->id }}">
                                            Expand JSON
                                        </button>
                                    
                                        <!-- Pass the $log variable to the JsonModal component -->
                                        <x-action-log-modal :log="$log" />
                                    </td>
                                    
                                    <td class="px-5 py-4 sm:px-6 text-left">{{ $log->created_at->format('Y-m-d H:i:s') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <p class="text-gray-500 dark:text-gray-400">{{ __('No action logs found') }}</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $actionLogs->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script>
        document.querySelector('[data-modal-toggle="json-modal-{{ $log->id }}"]').addEventListener('click',
        function() {
            document.getElementById('json-modal-{{ $log->id }}').classList.remove('hidden');
        });

        document.querySelector('[data-modal-hide="json-modal-{{ $log->id }}"]').addEventListener('click', function() {
            document.getElementById('json-modal-{{ $log->id }}').classList.add('hidden');
        });
    </script>
@endpush
