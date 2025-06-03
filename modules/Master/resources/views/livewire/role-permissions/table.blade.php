<div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div
        class="flex flex-col gap-y-4 px-5 py-4 sm:px-6 sm:py-5 md:flex-row md:justify-between md:items-center md:gap-y-0">
        {{-- Rows per Page --}}
        <div class="flex items-center gap-x-4 lg:w-1/2">
            <span class="text-gray-800 dark:text-white/90">Showing</span>
            {{-- Rows per Page --}}
            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                    @change="isOptionSelected = true" wire:model.live="perPage">
                    @foreach (range(10, 50, 10) as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
                <span
                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </div>
            <span class="text-gray-800 dark:text-white/90">entires</span>
        </div>
        {{-- Table Filter --}}
        <div class="flex flex-col gap-y-2 md:flex-row md:justify-end md:gap-y-0 md:gap-x-2 lg:w-1/2">
            {{-- Search --}}
            <input type="text" placeholder="Search role..." class="text-input w-64"
                wire:model.live.debounce.300ms="search" />
            {{-- Create Data Button --}}
            <a href="{{ route('master.role-permissions.create') }}" class="btn-icon-primary" @click="isCreateModalOpen = true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-nowrap">Add New</span>
            </a>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="custom-scrollbar max-w-full overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <th class="px-5 py-3 sm:px-6">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        #
                                    </p>
                                </div>
                            </th>
                            <th wire:click="sortBy('name')" class="cursor-pointer px-5 py-3 sm:px-6">
                                <div class="flex items-center gap-x-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Name
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 text-gray-500 dark:text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </th>
                            <th class="cursor-pointer px-5 py-3 sm:px-6">
                                <div class="flex items-center gap-x-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Permissions
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse ($rolePermissions as $item)
                            <tr>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                            {{ $loop->iteration }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                            {{ $item->name }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        @php
                                            $permissions = $item->permissions->take(4);
                                            $totalPermissions = $item->permissions->count();
                                        @endphp
                                        @if ($totalPermissions > 0)
                                            @foreach ($permissions as $permission)
                                                <span class="inline-flex items-center justify-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-700 dark:bg-white/5 dark:text-white/80">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                            @if ($totalPermissions > 4)
                                                <span class="inline-flex items-center justify-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-700 dark:bg-white/5 dark:text-white/80">
                                                    {{ $totalPermissions - 4 }}+
                                                </span>
                                            @endif
                                        @else
                                            <span class="inline-flex items-center justify-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-700 dark:bg-white/5 dark:text-white/80">
                                                No Permissions
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div x-data="{ openDropDown: false }" class="relative">
                                        <button @click="openDropDown = !openDropDown"
                                            class="text-gray-500 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </button>
                                        <div x-show="openDropDown"
                                            x-on:studyprogram-deleted.window="openDropDown = false"
                                            @click.outside="openDropDown = false"
                                            class="shadow-theme-lg dark:bg-gray-dark absolute top-full right-0 z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                            style="display: none;">
                                            <button
                                                class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-4 sm:px-6">
                                    <p class="text-center leading-7 text-theme-sm text-gray-500 dark:text-gray-400">
                                        Data still empty!</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Pagination --}}
        <div class="mt-5">
            {{ $rolePermissions->links('core::vendor.livewire.tailadmin') }}
        </div>
    </div>
</div>
