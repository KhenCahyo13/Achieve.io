<div class="card">
    <div class="px-5 py-4 sm:px-6 sm:py-5">
        <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
            <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
                <div class="flex flex-col items-center w-full gap-6 xl:flex-row">
                    {{-- Profile --}}
                    <div x-data="{
                        hovered: false,
                    }" @mouseenter="hovered = true" @mouseleave="hovered = false"
                        class="w-20 h-20 relative overflow-hidden border border-gray-200 rounded-full dark:border-gray-800">
                        <!-- Profile Picture -->
                        @if ($profilePicture)
                            <img src={{ $profilePicture->temporaryUrl() }} class="object-cover w-full h-full"
                                alt="user">
                        @else
                            <img src="{{ $userWithDetails && $userWithDetails->getFirstMediaUrl('profile-picture') ? $userWithDetails->getFirstMediaUrl('profile-picture') : 'https://mastertondental.co.nz/wp-content/uploads/2022/12/team-profile-placeholder.jpg' }}"
                                class="object-cover w-full h-full" alt="user">
                        @endif

                        <!-- Hidden File Input -->
                        <input type="file" x-ref="input" class="hidden" wire:model.live="profilePicture" />

                        <!-- Overlay Button -->
                        <button x-show="hovered" x-transition @click="$refs.input.click()" type="button"
                            class="flex items-center justify-center w-full h-full absolute top-0 left-0 bg-gray-800/30 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </button>
                    </div>
                    {{-- Name --}}
                    <div class="order-3 xl:order-2">
                        <h4
                            class="mb-2 text-lg font-semibold text-center text-gray-800 dark:text-white/90 xl:text-left capitalize">
                            {{ auth()->user()->name }}
                        </h4>
                        <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->email }}
                            </p>
                            <div class="hidden h-3.5 w-px bg-gray-300 dark:bg-gray-700 xl:block"></div>
                            @if (auth()->user()->hasRole('Admin'))
                                <p class="text-sm text-gray-500 dark:text-gray-400">Administrator</p>
                            @elseif (auth()->user()->hasRole('Student'))
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Student of {{ $userWithDetails->student->studyProgram->name ?? '-' }}
                                </p>
                            @elseif (auth()->user()->hasRole('Supervisor'))
                                <p class="text-sm text-gray-500 dark:text-gray-400">Lecturer of
                                    {{ $userWithDetails->lecturer->department->name ?? '-' }}</p>
                            @endif
                        </div>
                        @error('profilePicture')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($profilePicture)
                    <button wire:click="updateProfilePicture()"
                        class="text-nowrap flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
                        Update Profile Picture
                    </button>
                @endif
                @if (auth()->user()->hasRole('Admin'))
                    <button @click="isProfileInfoModal = true" class="btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>

                        Edit
                    </button>
                @endif
            </div>
        </div>
        {{-- Student & Lecturer Personal Information --}}
        @if (auth()->user()->hasRole(['Student', 'Supervisor']) && $userWithDetails !== null)
            <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                            Personal Information
                        </h4>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">Fullname</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    {{ auth()->user()->name }}</p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    @if (auth()->user()->hasRole('Student'))
                                        NIM
                                    @else
                                        NIP
                                    @endif
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    @if (auth()->user()->hasRole('Student'))
                                        {{ $userWithDetails->student->nim ?? '-' }}
                                    @else
                                        {{ $userWithDetails->lecturer->nip ?? '-' }}
                                    @endif
                                </p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">
                                    @if (auth()->user()->hasRole('Student'))
                                        Study Program
                                    @else
                                        Department
                                    @endif
                                </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    @if (auth()->user()->hasRole('Student'))
                                        {{ $userWithDetails->student->studyProgram->name ?? '-' }}
                                    @else
                                        {{ $userWithDetails->lecturer->department->name ?? '-' }}
                                    @endif
                                </p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">Phone Number</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    @if (auth()->user()->hasRole('Student'))
                                        {{ $userWithDetails->student->phone_number ?? '-' }}
                                    @else
                                        {{ $userWithDetails->lecturer->phone_number ?? '-' }}
                                    @endif
                                </p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">Email</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    {{ auth()->user()->email }}</p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">Address</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    @if (auth()->user()->hasRole('Student'))
                                        {{ $userWithDetails->student->address ?? '-' }}
                                    @else
                                        {{ $userWithDetails->lecturer->address ?? '-' }}
                                    @endif
                                </p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xs leading-normal text-gray-500 dark:text-gray-400">Birth Date</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                                    @if (auth()->user()->hasRole('Student'))
                                        {{ $userWithDetails->student->birth_date ? \Carbon\Carbon::parse($userWithDetails->student->birth_date)->translatedFormat('d F Y') : '-' }}
                                    @else
                                        {{ $userWithDetails->lecturer->birth_date ? \Carbon\Carbon::parse($userWithDetails->lecturer->birth_date)->translatedFormat('d F Y') : '-' }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <button wire:click="showUpdatePersonalInformationModal()"=true" class="btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>

                        Edit
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
