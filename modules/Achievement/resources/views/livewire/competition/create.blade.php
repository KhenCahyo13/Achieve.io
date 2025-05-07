@php
    $levels = ['Local', 'National', 'International'];
    $categories = ['Team', 'Individual'];
@endphp

<div class="card">
    <div class="px-5 py-4 sm:px-6 sm:py-5">
        <form wire:submit="save" class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2 lg:grid-cols-3">
            {{-- Name --}}
            <div class="form-groups">
                <label class="form-label">
                    Name <span class="text-red-500">*</span>
                </label>
                <input type="text" placeholder="Competition name" class="text-input" wire:model="form.name">
                @error('form.name')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- Level --}}
            <div class="form-groups">
                <label class="form-label">
                    Level <span class="text-red-500">*</span>
                </label>
                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                    <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                        @change="isOptionSelected = true" wire:model="form.level">
                        <option value="">- Select level</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
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
                @error('form.level')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- Category --}}
            <div class="form-groups">
                <label class="form-label">
                    Category <span class="text-red-500">*</span>
                </label>
                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                    <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                        @change="isOptionSelected = true" wire:model="form.category">
                        <option value="">- Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
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
                @error('form.category')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- Description --}}
            <div class="form-groups col-span-full" wire:ignore>
                <label class="form-label">
                    Description <span class="text-red-500">*</span>
                </label>
                <x-trix-input id="description" name="description" />
                @error('form.description')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- Poster File --}}
            <div class="form-groups">
                <label class="form-label">
                    Poster <span class="text-red-500">*</span>
                </label>
                <input type="file" class="file-input" wire:model="form.poster" />
                @error('form.poster')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- Start Reg Date --}}
            <div class="form-groups">
                <label class="form-label">
                    Start Registration Date <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" placeholder="Select date" class="date-input" onclick="this.showPicker()"
                        wire:model="form.start_reg_date" />
                    <span
                        class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </span>
                </div>
                @error('form.start_reg_date')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- End Reg Date --}}
            <div class="form-groups">
                <label class="form-label">
                    End Registration Date <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" placeholder="Select date" class="date-input" onclick="this.showPicker()"
                        wire:model="form.end_reg_date" />
                    <span
                        class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </span>
                </div>
                @error('form.end_reg_date')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- Start Date --}}
            <div class="form-groups">
                <label class="form-label">
                    Start Competition Date <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" placeholder="Select date" class="date-input" onclick="this.showPicker()"
                        wire:model="form.start_date" />
                    <span
                        class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </span>
                </div>
                @error('form.start_date')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {{-- End Date --}}
            <div class="form-groups">
                <label class="form-label">
                    End Competition Date <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" placeholder="Select date" class="date-input" onclick="this.showPicker()"
                        wire:model="form.end_date" />
                    <span
                        class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </span>
                </div>
                @error('form.end_date')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mt-5 col-span-full flex justify-end gap-x-3">
                <a href="{{ route('achievement.competition.index') }}" class="btn-outline-danger">
                    Cancel
                </a>
                <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@script
    <script>
        document.addEventListener('trix-change', function (event) {
            $wire.$set('form.description', event.target.value);
        });
    </script>
@endscript
