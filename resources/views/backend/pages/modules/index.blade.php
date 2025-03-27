@extends('backend.layouts.app')

@section('title')
    {{ __('Modules - Admin Panel') }}
@endsection

@section('admin-content')

<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    @include('backend.layouts.partials.messages')

    <div x-data="{ pageName: 'Modules', showUploadArea: false }">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">
                Modules

                @if(count($modules) > 0)
                    <button
                        @click="showUploadArea = !showUploadArea"
                        class="ml-4 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600"
                    >
                        <i class="bi bi-cloud-upload mr-2"></i>
                        Upload Module
                    </button>
                @endif
            </h2>
            <nav>
                <ol class="flex items-center gap-1.5">
                    <li>
                        <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="{{ route('admin.dashboard') }}">
                            Home
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName">Modules</li>
                </ol>
            </nav>
        </div>

        <div x-show="showUploadArea" class="mb-6 p-6 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-600"
             @dragover.prevent
             @drop.prevent="$refs.uploadModule.files = $event.dataTransfer.files; $refs.uploadModule.dispatchEvent(new Event('change'))">
            <p class="text-center text-gray-600 dark:text-gray-400">
                Drag and drop your module file here, or
                <button
                    @click="$refs.uploadModule.click()"
                    class="text-blue-500 underline hover:text-blue-600"
                >
                    browse
                </button>
                to select a file.
            </p>
            <form action="{{ route('admin.modules.upload') }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                <input type="file" name="module" accept=".zip" x-ref="uploadModule" @change="$event.target.form.submit()">
            </form>
        </div>
    </div>

    @if ($modules->isEmpty())
        <div class="flex flex-col items-center justify-center h-64 bg-gray-100 dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300"
             @dragover.prevent
             @drop.prevent="$refs.uploadModule.files = $event.dataTransfer.files; $refs.uploadModule.dispatchEvent(new Event('change'))">
            <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Drag and drop your module file here, or</p>
            <button
                @click="$refs.uploadModule.click()"
                class="mt-4 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600"
            >
                <i class="bi bi-cloud-upload mr-2"></i>
                Upload
            </button>
            <form action="{{ route('admin.modules.upload') }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                <input type="file" name="module" accept=".zip" x-ref="uploadModule" @change="$event.target.form.submit()">
            </form>
        </div>
    @else
        @foreach ($modules as $category => $categoryModules)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">{{ ucFirst($category ?? 'Uncategorized ') }} Modules</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($categoryModules as $module)
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-800 dark:text-white">{{ $module->name }}</h3>

                                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $module->id }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>

                                <div id="dropdownDots{{ $module->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <button
                                                x-data
                                                @click="if(confirm('Are you sure you want to delete this module?')) { $refs.deleteForm{{ $module->id }}.submit(); }"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full px-2 text-left"
                                            >
                                                Delete
                                            </button>
                                            <form x-ref="deleteForm{{ $module->id }}" action="{{ route('admin.modules.delete', $module->id) }}" method="POST" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $module->description }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Priority: {{ $module->priority }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tags: {{ $module->tags }}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 {{ $module->status ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $module->status ? 'Enabled' : 'Disabled' }}
                                </span>
                                <button
                                    x-data
                                    @click="toggleModule({{ $module->id }}, $event)"
                                    class="px-4 py-2 text-sm font-medium rounded-lg bg-gray-200 text-gray-800 dark:bg-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700 transition-all"
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
