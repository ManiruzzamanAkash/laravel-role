@extends('backend.layouts.app')

@section('title')
    {{ __('Modules - Admin Panel') }}
@endsection

@section('admin-content')

<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div x-data="{ pageName: 'Modules' }">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Modules</h2>
        </div>
    </div>

    @if ($modules->isEmpty())
        <div class="flex flex-col items-center justify-center h-64 bg-gray-100 dark:bg-gray-800 rounded-lg">
            <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <p class="mt-4 text-gray-600 dark:text-gray-400">No modules have been added yet.</p>
            <button
                @click="$refs.uploadModule.click()"
                class="mt-4 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600"
            >
                Upload Module
            </button>
            <form action="{{ route('admin.modules.upload') }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                <input type="file" name="module" accept=".zip" x-ref="uploadModule" @change="$event.target.form.submit()">
            </form>
        </div>
    @else
        @foreach ($modules as $category => $categoryModules)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $category ?? 'Uncategorized' }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($categoryModules as $module)
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-white">{{ $module->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $module->description }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Priority: {{ $module->priority }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tags: {{ $module->tags }}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ $module->status ? 'Enabled' : 'Disabled' }}
                                </span>
                                <button
                                    x-data
                                    @click="toggleModule({{ $module->id }}, $event)"
                                    class="px-4 py-2 text-sm font-medium text-white rounded-lg"
                                    :class="{{ $module->status ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}"
                                >
                                    {{ $module->status ? 'Disable' : 'Enable' }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>

<script>
    function toggleModule(moduleId, event) {
        fetch(`/admin/modules/${moduleId}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const button = event.target;
                button.textContent = data.status ? 'Disable' : 'Enable';
                button.classList.toggle('bg-green-500', data.status);
                button.classList.toggle('hover:bg-green-600', data.status);
                button.classList.toggle('bg-red-500', !data.status);
                button.classList.toggle('hover:bg-red-600', !data.status);
            }
        });
    }
</script>

@endsection
