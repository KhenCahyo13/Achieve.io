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
            {{-- Get Recommendation Button --}}
            @can('get recommendation competition')
                <button class="btn-icon-primary" @click="isGetRecommendationModalOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                    </svg>

                    <span class="text-nowrap">Get Recommendation</span>
                </button>
            @endcan
        </div>
    </div>
    {{-- Data List --}}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @forelse ($competitions as $competition)
            <div
                class="flex flex-col gap-5 rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] sm:flex-row sm:items-center sm:gap-6">
                <div class="w-full h-32 overflow-hidden rounded-lg md:w-72 md:h-40">
                    <img src="{{ $competition->competition->getFirstMediaUrl('poster') }}" alt="Poster"
                        class="overflow-hidden rounded-lg w-full h-full object-cover">
                </div>

                <div>
                    <h4 class="mb-1 text-theme-xl font-medium text-gray-800 dark:text-white/90">
                        {{ $competition->competition->name }}
                    </h4>
                    @php
                        $startRegDate = \Carbon\Carbon::parse(
                            $competition->competition->start_reg_date,
                        )->translatedFormat('d F Y');
                        $endRegDate = \Carbon\Carbon::parse($competition->competition->end_reg_date)->translatedFormat(
                            'd F Y',
                        );
                    @endphp
                    <div class="flex items-center gap-x-2">
                        @if (\Carbon\Carbon::parse($competition->competition->end_reg_date)->lt(now()))
                            <livewire:core::components.badge type="error" text="Closed" />
                        @else
                            <livewire:core::components.badge type="success" text="Open" />
                        @endif
                        <p class="text-sm text-gray-400">
                            {{ $startRegDate }} - {{ $endRegDate }}
                        </p>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-x-1 gap-y-1">
                        <livewire:core::components.badge type="light" text="{{ $competition->competition->level }}" />
                        <livewire:core::components.badge type="light"
                            text="{{ $competition->competition->category }} Competition" />
                        @foreach ($competition->competition->fields as $field)
                            <livewire:core::components.badge type="light" text="{{ $field->name }}" />
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="py-6 col-span-full">
                <img src="{{ asset('images/fallback/data-not-found.png') }}" alt="Not Found" class="w-40 mx-auto">
                <p class="text-lg text-gray-400 text-center mt-4 font-medium">Oops! Data not found</p>
            </div>
        @endforelse
    </div>
    {{-- Pagination --}}
    <div class="mt-5">
        {{ $competitions->links('core::vendor.livewire.tailadmin') }}
    </div>
</div>
