<div x-show="isUpdateModalOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
    <div x-show="isUpdateModalOpen" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div x-show="isUpdateModalOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10"
        @click.outside="isUpdateModalOpen = false">
        {{-- Close Btn --}}
        <button @click="isUpdateModalOpen = false"
            class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        @can('update period')
            <form wire:submit="save">
                <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                    Update Period
                </h4>
                {{-- Form --}}
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                    <div class="form-groups col-span-full">
                        <label class="form-label">
                            Title
                        </label>
                        <input type="text" placeholder="Tahun Ajaran 2024/2025" class="text-input"
                            wire:model="form.title">
                        @error('form.title')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-groups">
                        <label class="form-label">
                            Start Year
                        </label>
                        <input type="text" placeholder="2024" class="text-input" wire:model="form.start_year">
                        @error('form.start_year')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-groups">
                        <label class="form-label">
                            End Year
                        </label>
                        <input type="text" placeholder="2025" class="text-input" wire:model="form.end_year">
                        @error('form.end_year')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Actions Button --}}
                <div class="flex items-center justify-end w-full gap-3 mt-6">
                    <button @click="isUpdateModalOpen = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
                        Close
                    </button>
                    <button type="submit"
                        class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
                        Update
                    </button>
                </div>
            </form>
        @endcan
    </div>
</div>
