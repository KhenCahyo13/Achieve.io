@php
    $levels = ['Local', 'National', 'International'];
    $categories = ['Team', 'Individual'];
@endphp

<div class="flex flex-col gap-y-5 border-t border-gray-100 dark:border-gray-800 px-5 py-5 sm:px-6">
    {{-- Filter --}}
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
        {{-- Filters --}}
        <div class="flex flex-col gap-y-2 md:flex-row md:gap-y-0 md:gap-x-2">
            {{-- Search --}}
            <input type="text" placeholder="Search competition..." class="text-input lg:w-72"
                wire:model.live.debounce.300ms="search" />
            {{-- Filter --}}
            <div x-data="{ openDropDown: false }" class="relative inline-block">
                <button @click.prevent="openDropDown = !openDropDown" class="btn-outline-primary" :class="openDropDown ? 'bg-brand-600 text-white' : ''">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                </button>
                <div x-show="openDropDown" @click.outside="openDropDown = false" class="filters-dropdown"
                    style="display: none;">
                    <p
                        class="divider pb-1 border-b border-gray-100 dark:border-gray-800 leading-7 font-medium dark:text-white/90">
                        Data Filters</p>
                    <ul class="grid grid-cols-1 lg:grid-cols-2 gap-2 mt-4">
                        <li class="form-groups">
                            <label class="form-label">
                                Level
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select class="select-input"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true"
                                    x-on:change="$wire.setFilters('level', $event.target.value)">
                                    <option value="">- Select level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level }}">{{ $level }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                        <li class="form-groups">
                            <label class="form-label">
                                Category
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select class="select-input"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true"
                                    x-on:change="$wire.setFilters('category', $event.target.value)">
                                    <option value="">- Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Data List --}}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @forelse ($competitions as $competition)
            @php
                $posterPath = $competition->getFirstMediaUrl('poster');
            @endphp
            <div
                class="flex flex-col gap-5 rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] sm:flex-row sm:items-center sm:gap-6">
                <div class="w-full h-32 overflow-hidden rounded-lg md:w-36">
                    <img src="{{ asset("$posterPath") }}" alt="Poster" class="overflow-hidden rounded-lg">
                </div>

                <div>
                    <h4 class="mb-1 text-theme-xl font-medium text-gray-800 dark:text-white/90">
                        {{ $competition->name }}
                    </h4>

                    <div class="mt-4 flex flex-wrap gap-x-1">
                        <livewire:core::components.badge type="light" text="{{ $competition->level }}" />
                        <livewire:core::components.badge type="light"
                            text="{{ $competition->category }} Competition" />
                    </div>

                    <button wire:click="showDetailsModal('{{ $competition->id }}')"
                        class="mt-4 btn-icon-primary-transparent cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        See Details
                    </button>
                </div>
            </div>
        @empty
            <div class="py-6 col-span-full">
                <p class="text-center leading-7 text-theme-sm text-gray-500 dark:text-gray-400">Data still empty!</p>
            </div>
        @endforelse
    </div>
    {{-- Pagination --}}
    <div class="mt-5">
        {{ $competitions->links('core::vendor.livewire.tailadmin') }}
    </div>
</div>
