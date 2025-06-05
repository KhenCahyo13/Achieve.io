@php
    $entityList = [
        'achievement' => 'Achievement',
        'competition' => 'Competition',
        'department' => 'Department',
        'study program' => 'Study Program',
        'period' => 'Period',
        'role permissions' => 'Role & Permissions',
    ];

    $generalPermissions = [
        'view' => 'View',
        'create' => 'Create',
        'update' => 'Update',
        'delete' => 'Delete',
    ];

    $achievementPermissions = [
        'view' => 'View',
        'create' => 'Create',
        'update' => 'Update',
        'delete' => 'Delete',
        'verify' => 'Verify',
        'export data' => 'Export Data',
    ];

    $competitionPermissions = [
        'view' => 'View',
        'create' => 'Create',
        'update' => 'Update',
        'delete' => 'Delete',
        'verify' => 'Verify',
        'register' => 'Register',
        'get recommendation' => 'Get Recommendation',
    ];
@endphp

<div>
    @can('create role permissions')
        <form wire:submit="save" class="card">
            <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800">
                <h1 class="text-lg font-medium text-gray-800 dark:text-white">Role</h1>
            </div>
            <div class="px-5 py-4 grid grid-cols-1 gap-x-8 md:grid-cols-2">
                <div class="form-groups">
                    <label class="form-label">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" placeholder="Enter role name" class="text-input" wire:model="form.name">
                    @error('form.name')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-groups">
                    <label class="form-label">
                        Description
                    </label>
                    <input type="text" placeholder="Enter role description" class="text-input"
                        wire:model="form.description">
                    @error('form.description')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800">
                <h1 class="text-lg font-medium text-gray-800 dark:text-white">Permissions</h1>
            </div>
            <div class="px-5 py-4 flex flex-col gap-y-4 md:gap-y-6 lg:gap-y-8">
                @foreach ($entityList as $entityKey => $entity)
                    <div class="form-groups gap-y-4">
                        <div class="flex items-center justify-between">
                            <label class="form-label text-base">
                                {{ $entity }}
                            </label>
                        </div>
                        <div class="flex gap-y-4 gap-x-4 flex-wrap items-center md:gap-x-6">
                            @if ($entityKey == 'achievement')
                                @foreach ($achievementPermissions as $key => $value)
                                    <label for="{{ $entityKey . '-' . $key }}"
                                        class="flex items-center gap-x-2 cursor-pointer">
                                        <div class="w-5 h-5 relative">
                                            <input id="{{ $entityKey . '-' . $key }}" type="checkbox"
                                                value="{{ $key . ' ' . $entityKey }}"
                                                class="peer appearance-none w-full h-full bg-gray-200 rounded-sm focus:ring-brand-500 focus:ring-1 checked:bg-brand-500"
                                                wire:model="form.permissions">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor"
                                                class="size-5 text-white absolute top-0 left-0 hidden peer-checked:block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </div>
                                        <span class="text-sm">{{ $value }}</span>
                                    </label>
                                @endforeach
                            @elseif ($entityKey == 'competition')
                                @foreach ($competitionPermissions as $key => $value)
                                    <label for="{{ $entityKey . '-' . $key }}"
                                        class="flex items-center gap-x-2 cursor-pointer">
                                        <div class="w-5 h-5 relative">
                                            <input id="{{ $entityKey . '-' . $key }}" type="checkbox"
                                                value="{{ $key . ' ' . $entityKey }}"
                                                class="peer appearance-none w-full h-full bg-gray-200 rounded-sm focus:ring-brand-500 focus:ring-1 checked:bg-brand-500"
                                                wire:model="form.permissions">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor"
                                                class="size-5 text-white absolute top-0 left-0 hidden peer-checked:block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </div>
                                        <span class="text-sm">{{ $value }}</span>
                                    </label>
                                @endforeach
                            @else
                                @foreach ($generalPermissions as $key => $value)
                                    <label for="{{ $entityKey . '-' . $key }}"
                                        class="flex items-center gap-x-2 cursor-pointer">
                                        <div class="w-5 h-5 relative">
                                            <input id="{{ $entityKey . '-' . $key }}" type="checkbox"
                                                value="{{ $key . ' ' . $entityKey }}"
                                                class="peer appearance-none w-full h-full bg-gray-200 rounded-sm focus:ring-brand-500 focus:ring-1 checked:bg-brand-500"
                                                wire:model="form.permissions">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor"
                                                class="size-5 text-white absolute top-0 left-0 hidden peer-checked:block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </div>
                                        <span class="text-sm">{{ $value }}</span>
                                    </label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-5 px-5 col-span-full flex justify-end gap-x-3">
                <a href="{{ route('master.role-permissions.index') }}" class="btn-outline-danger">
                    Cancel
                </a>
                <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                    Save
                </button>
            </div>
        </form>
    @endcan
</div>
