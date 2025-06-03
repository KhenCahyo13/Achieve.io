<div x-show="isUpdatePersonalInformationModalOpen"
    class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
    <div x-show="isUpdatePersonalInformationModalOpen" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div x-show="isUpdatePersonalInformationModalOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10"
        @click.outside="isUpdatePersonalInformationModalOpen = false">
        {{-- Close Btn --}}
        <button @click="isUpdatePersonalInformationModalOpen = false"
            class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <form wire:submit="save">
            <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                Update Personal Information
            </h4>
            {{-- Form --}}
            <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                <div class="flex flex-col gap-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Fullname
                    </label>
                    <input type="text" placeholder="Fullname" class="text-input" wire:model="form.name">
                    @error('form.name')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        @if (auth()->user()->hasRole('Student'))
                            NIM
                        @else
                            NIP
                        @endif
                    </label>
                    <input type="text" placeholder="Master Number" class="text-input" wire:model="form.masterNumber">
                    @error('form.masterNumber')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                @if (auth()->user()->hasRole('Student'))
                    <div class="flex flex-col gap-y-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Study Program
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                @change="isOptionSelected = true" wire:model="form.placeId">
                                <option value="">- Select study program</option>
                                @foreach ($studyPrograms as $studyProgram)
                                    <option value="{{ $studyProgram->id }}">{{ $studyProgram->name }}</option>
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
                        @error('form.placeId')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                @else
                    <div class="flex flex-col gap-y-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Department
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select class="select-input" :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                @change="isOptionSelected = true" wire:model="form.placeId">
                                <option value="">- Select department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                        @error('form.placeId')
                            <span class="text-theme-xs text-error-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                @endif
                <div class="flex flex-col gap-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Phone Number
                    </label>
                    <input type="text" placeholder="Phone Number" class="text-input" wire:model="form.phoneNumber">
                    @error('form.phoneNumber')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Email
                    </label>
                    <input type="email" placeholder="Email" class="text-input" wire:model="form.email">
                    @error('form.email')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Address
                    </label>
                    <input type="text" placeholder="Address" class="text-input" wire:model="form.address">
                    @error('form.address')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Birth Date
                    </label>
                    <input type="date" placeholder="Birth Date" class="date-input" wire:model="form.birthDate">
                    @error('form.birthDate')
                        <span class="text-theme-xs text-error-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Actions Button --}}
            <div class="flex items-center justify-end w-full gap-3 mt-6">
                <button @click="isUpdatePersonalInformationModalOpen = false" type="button"
                    class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
                    Close
                </button>
                <button type="submit"
                    class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
