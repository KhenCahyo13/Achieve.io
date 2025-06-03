<div x-show="isCreateModalOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
    <div x-show="isCreateModalOpen" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div x-show="isCreateModalOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10"
        @click.outside="isCreateModalOpen = false">
        {{-- Close Btn --}}
        <button @click="isCreateModalOpen = false"
            class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        @can('create achievement')
            <form wire:submit="save">
                <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                    Add New Achievement
                </h4>
                {{-- Form --}}
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">
                    <div class="form-groups col-span-full">
                        <label class="form-label">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Achievement title" class="text-input" wire:model="form.title">
                        @error('form.title')
                            <span class="form-error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-groups col-span-full">
                        <label class="form-label">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea rows="4" class="textarea-input" placeholder="Achievement description" wire:model="form.description"></textarea>
                        @error('form.description')
                            <span class="form-error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-groups">
                        <div class="flex flex-col">
                            <label class="form-label">
                                Competition <span class="text-red-500">*</span>
                            </label>
                            <span class="form-error text-gray-400">List of competitions you participated in</span>
                        </div>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                @change="isOptionSelected = true" wire:model="form.participantId">
                                <option value="">- Select competition</option>
                                @foreach ($competitions as $competition)
                                    <option value="{{ $competition->id }}">{{ $competition->competition->name }} -
                                        {{ $competition->competition->category }}</option>
                                @endforeach
                            </select>
                            <span
                                class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                        @error('form.participantId')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-groups">
                        <div class="flex flex-col">
                            <label class="form-label">
                                Periods <span class="text-red-500">*</span>
                            </label>
                            <span class="form-error text-gray-400">Period when participating in the competition</span>
                        </div>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                @change="isOptionSelected = true" wire:model="form.periodId">
                                <option value="">- Select period</option>
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}">{{ $period->title }}</option>
                                @endforeach
                            </select>
                            <span
                                class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                        @error('form.periodId')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-groups col-span-full">
                        <label class="form-label">
                            Certificate <span class="text-red-500">*</span>
                        </label>
                        <div @class([
                            'relative overflow-hidden p-8 flex w-full flex-col items-center justify-center gap-2 rounded-lg border border-dashed border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white/30',
                            'text-white/80' => $certificate,
                        ])>
                            @if ($certificate)
                                <div class="absolute z-30">
                                    <div class="absolute flex h-full w-full items-center justify-center bg-black/60"></div>
                                    <img src="{{ $certificate->temporaryUrl() }}" alt="Certificate">
                                </div>
                            @endif
                            <div class="flex flex-col items-center gap-y-2 z-40">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                                <label for="certificateFile" class="font-medium cursor-pointer hover:underline">
                                    <input id="certificateFile" type="file" class="sr-only"
                                        aria-describedby="validFileFormats" wire:model="certificate" />
                                    Upload or change file here
                                </label>
                                <small id="validFileFormats">File Image - Max 2MB</small>
                            </div>
                        </div>
                        @error('certificate')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Actions Button --}}
                <div class="flex items-center justify-end w-full gap-3 mt-6">
                    <button @click="isCreateModalOpen = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
                        Close
                    </button>
                    <button type="submit"
                        class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
                        Save
                    </button>
                </div>
            </form>
        @endcan
    </div>
</div>
