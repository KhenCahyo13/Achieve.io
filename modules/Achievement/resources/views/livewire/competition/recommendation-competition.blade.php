<div x-show="isGetRecommendationModalOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="translate-x-full opacity-0"
    class="fixed left-0 top-0 z-99999 flex h-screen w-full flex-col items-center justify-between overflow-y-auto overflow-x-hidden bg-white p-6 dark:bg-gray-900 lg:p-10 transform">
    <!-- close btn -->
    <button @click="isGetRecommendationModalOpen = false"
        class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                fill=""></path>
        </svg>
    </button>

    <div class="w-full">
        <h4 class="mb-7 text-title-sm font-semibold text-gray-800 dark:text-white/90">
            Get Recommendation Competitions
        </h4>
        <form action="" class="pb-8 border-b border-gray-100 dark:border-gray-800">
            <div class="grid grid-cols-1 gap-y-5 md:grid-cols-3 md:gap-x-8 lg:grid-cols-4">
                {{-- Department --}}
                <div class="form-groups">
                    <label class="form-label">
                        Department <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                            @change="isOptionSelected = true" wire:model="department">
                            <option value="">- Select department</option>
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    @error('department')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Interest Field --}}
                <div class="form-groups">
                    <label class="form-label">
                        Interest Field <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                            @change="isOptionSelected = true" wire:model="interestField">
                            <option value="">- Select field</option>
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    @error('interestField')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Skill Level --}}
                <div class="form-groups">
                    <label class="form-label">
                        Skill Level <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                            @change="isOptionSelected = true" wire:model="skillLevel">
                            <option value="">- Select level</option>
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    @error('skillLevel')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Skill Level --}}
                <div class="form-groups">
                    <label class="form-label">
                        Like Teamworks <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                            @change="isOptionSelected = true" wire:model="likeTeamworks">
                            <option value="">- Select option</option>
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    @error('likeTeamworks')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Number of Participants --}}
                <div class="form-groups">
                    <label class="form-label">
                        Number of Participants <span class="text-red-500">*</span>
                    </label>
                    <input type="number" placeholder="Number of Participants" class="text-input"
                        wire:model="numberOfParticipants">
                    @error('numberOfParticipants')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Number of Championships --}}
                <div class="form-groups">
                    <label class="form-label">
                        Number of Championships <span class="text-red-500">*</span>
                    </label>
                    <input type="number" placeholder="Number of Championships" class="text-input"
                        wire:model="numberOfChampionships">
                    @error('numberOfChampionships')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Get Recommendation</button>
            </div>
        </form>
        <div class="pt-8 flex flex-col gap-y-4">
            <p class="text-gray-800 dark:text-white/90 text-lg font-medium">Recommendation Results</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($competitions as $competition)
                    <div
                        class="flex flex-col gap-5 rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] sm:flex-row sm:items-center sm:gap-6">
                        <div class="w-full h-32 overflow-hidden rounded-lg md:w-72 md:h-40">
                            <img src="{{ asset($competition->competition->getFirstMediaUrl('poster')) }}" alt="Poster"
                                class="overflow-hidden rounded-lg w-full h-full object-cover">
                        </div>

                        <div>
                            <h4 class="mb-1 text-theme-xl font-medium text-gray-800 dark:text-white/90">
                                {{ $competition->name }}
                            </h4>
                            @php
                                $startRegDate = \Carbon\Carbon::parse($competition->start_reg_date)->translatedFormat(
                                    'd F Y',
                                );
                                $endRegDate = \Carbon\Carbon::parse($competition->end_reg_date)->translatedFormat(
                                    'd F Y',
                                );
                            @endphp
                            <div class="flex items-center gap-x-2">
                                @if (\Carbon\Carbon::parse($competition->end_reg_date)->lt(now()))
                                    <livewire:core::components.badge type="error" text="Closed" />
                                @else
                                    <livewire:core::components.badge type="success" text="Open" />
                                @endif
                                <p class="text-sm text-gray-400">
                                    {{ $startRegDate }} - {{ $endRegDate }}
                                </p>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-x-1 gap-y-1">
                                <livewire:core::components.badge type="light" text="{{ $competition->level }}" />
                                <livewire:core::components.badge type="light"
                                    text="{{ $competition->category }} Competition" />
                                @foreach ($competition->fields as $field)
                                    <livewire:core::components.badge type="light" text="{{ $field->name }}" />
                                @endforeach
                            </div>

                            <button wire:click="showDetailsModal('{{ $competition->id }}')"
                                class="mt-4 btn-icon-primary-transparent cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
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
                    <div class="col-span-full">
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Fill the form to get recommendation</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
