<div class="flex flex-col gap-y-5 border-t border-gray-100 dark:border-gray-800 px-5 py-5 sm:px-6">
    <div class="flex flex-col gap-y-4 md:flex-row md:justify-between md:items-center md:gap-y-0">
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
            <input type="text" placeholder="Search achievement..." class="text-input w-64"
                wire:model.live.debounce.300ms="search" />
            {{-- Create Data Button --}}
            @can('create achievement')
                <button class="btn-icon-primary" @click="isCreateModalOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="text-nowrap">Add New</span>
                </button>
            @endcan
            @can('export data achievement')
                <button class="btn-icon-primary" @click="isExportPdfModalOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <span class="text-nowrap">Export PDF</span>
                </button>
            @endcan
        </div>
    </div>
    {{-- Table Content --}}
    <div class="border-t border-gray-100 dark:border-gray-800">
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
                            <th wire:click="sortBy('title')" class="cursor-pointer px-5 py-3 sm:px-6">
                                <div class="flex items-center gap-x-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Title
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
                                        Team Name
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 text-gray-500 dark:text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </th>
                            @if (auth()->user()->hasRole('Admin'))
                                <th class="cursor-pointer px-5 py-3 sm:px-6">
                                    <div class="flex items-center gap-x-2">
                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                            Student
                                        </p>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-5 text-gray-500 dark:text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </div>
                                </th>
                            @endif
                            <th class="cursor-pointer px-5 py-3 sm:px-6">
                                <div class="flex items-center gap-x-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Lecturer
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 text-gray-500 dark:text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </th>
                            <th wire:click="sortBy('title')" class="cursor-pointer px-5 py-3 sm:px-6">
                                <div class="flex items-center gap-x-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Verification Status
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 text-gray-500 dark:text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </th>
                            <th wire:click="sortBy('created_at')" class="cursor-pointer px-5 py-3 sm:px-6">
                                <div class="flex items-center gap-x-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Created at
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 text-gray-500 dark:text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse ($achievements as $achievement)
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
                                            {{ $achievement->title }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                            {{ $achievement->participant->team_name ?? '-' }}
                                        </p>
                                    </div>
                                </td>
                                @if (auth()->user()->hasRole('Admin'))
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center">
                                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                {{ $achievement->student->name ?? '-' }}
                                            </p>
                                        </div>
                                    </td>
                                @endif
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                            {{ $achievement->participant->lecturer->name ?? '-' }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        @if ($achievement->verification_status === 'On Process')
                                            <span
                                                class="inline-flex items-center justify-center gap-1 rounded-full bg-blue-50 px-2.5 py-0.5 text-sm font-medium text-blue-600 dark:bg-blue-500/15 dark:text-blue-500">
                                                On Process
                                            </span>
                                        @elseif ($achievement->verification_status === 'Rejected')
                                            <span
                                                class="inline-flex items-center justify-center gap-1 rounded-full bg-red-50 px-2.5 py-0.5 text-sm font-medium text-red-600 dark:bg-red-500/15 dark:text-red-500">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center justify-center gap-1 rounded-full bg-green-50 px-2.5 py-0.5 text-sm font-medium text-green-600 dark:bg-green-500/15 dark:text-green-500">
                                                Approved
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                            {{ $achievement->created_at->locale('id')->translatedFormat('d F Y H:i') }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div x-data="{ openDropDown: false }" class="relative">
                                        <button @click="openDropDown = !openDropDown"
                                            class="text-gray-500 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </button>
                                        <div x-show="openDropDown"
                                            x-on:achievement-deleted.window="openDropDown = false"
                                            @click.outside="openDropDown = false"
                                            class="shadow-theme-lg dark:bg-gray-dark absolute top-full right-0 z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                            style="display: none;">
                                            @can('view achievement')
                                                <button wire:click="showDetailsModal('{{ $achievement->id }}')"
                                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    Details
                                                </button>
                                            @endcan
                                            @can('update achievement')
                                                @if ($achievement->verification_status === 'On Process')
                                                    <button wire:click="showUpdateModal('{{ $achievement->id }}')"
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Update
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('delete achievement')
                                                <button wire:click="delete('{{ $achievement->id }}')"
                                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    Delete
                                                </button>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-4 sm:px-6">
                                    <img src="{{ asset('images/fallback/data-not-found.png') }}" alt="Not Found"
                                        class="w-40 mx-auto">
                                    <p class="text-lg text-gray-400 text-center mt-4 font-medium">Oops! Data not found
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Pagination --}}
        <div class="mt-5">
            {{ $achievements->links('core::vendor.livewire.tailadmin') }}
        </div>
    </div>
</div>
