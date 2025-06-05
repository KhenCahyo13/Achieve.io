<div x-show="isDetailsModalOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
    <div x-show="isDetailsModalOpen" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div x-show="isDetailsModalOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="relative w-full max-w-[724px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10"
        @click.outside="isDetailsModalOpen = false">
        {{-- Close Btn --}}
        <button @click="isDetailsModalOpen = false"
            class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
            Achievement Details
        </h4>
        @if ($achievement)
            <div class="h-96 overflow-y-auto">
                @if ($achievement->verification_status === 'Rejected')
                    <div class="bg-red-100 rounded-lg px-4 py-4 mb-4 dark:bg-gray-400">
                        <p class="font-medium text-red-500 dark:text-white/90">Rejected Reason</p>
                        <p class="text-sm text-red-500 dark:text-white/90 mt-1">{{ $achievement->reasons }}</p>
                    </div>
                @endif
                <div class="flex flex-col gap-y-4">
                    <p class="font-medium text-base text-gray-800 dark:text-white/90">Achievement Information</p>
                    <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2">
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Title</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">{{ $achievement->title ?? '-' }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Description</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->description ?? '-' }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Period</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->period->title ?? '-' }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Created by</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->student->name ?? '-' }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Certificate File</p>
                            <a href="{{ $achievement->getFirstMediaUrl('certificate') }}" target="_blank"
                                class="text-gray-800 text-theme-sm dark:text-white/90 underline">
                                Show Certificate
                            </a>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Verification Status</p>
                            <livewire:core::components.badge
                                type="{{ $achievement->verification_status === 'On Process' ? 'info' : ($achievement->verification_status === 'Rejected' ? 'error' : 'success') }}"
                                text="{{ $achievement->verification_status }}" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-4 mt-8">
                    <p class="font-medium text-base text-gray-800 dark:text-white/90">Followed Competition</p>
                    <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 lg:grid-cols-3">
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Name</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->participant->competition->name ?? '-' }}</p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Category</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->participant->competition->category ?? '-' }}</p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Level</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->participant->competition->level ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-4 mt-8">
                    <p class="font-medium text-base text-gray-800 dark:text-white/90">Participant Information</p>
                    <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 lg:grid-cols-3">
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Team Name</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->participant->team_name ?? '-' }}</p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Topic</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->participant->topic_title ?? '-' }}</p>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">Supervisor</p>
                            <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                {{ $achievement->participant->lecturer->name ?? '-' }}</p>
                        </div>
                        @if ($achievement->participant->competition->category === 'Team')
                            <div class="flex flex-col gap-y-1 col-span-full">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">Members</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li class="text-gray-800 text-theme-sm dark:text-white/90">
                                        {{ $achievement->participant->leader->name ?? '-' }} - <span
                                            class="text-success-500">Leader</span>
                                    </li>
                                    @foreach ($achievement->participant->members as $member)
                                        <li class="text-gray-800 text-theme-sm dark:text-white/90">
                                            {{ $member->name ?? '-' }} - <span class="text-error-500">Member</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="flex flex-col gap-y-1">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">Member</p>
                                <p class="text-gray-800 text-theme-sm dark:text-white/90">
                                    {{ $achievement->participant->leader->name ?? '-' }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                @if ($achievement->verification_status === 'On Process')
                    <div class="flex flex-col gap-y-4 mt-8">
                        <div class="flex flex-col gap-y-0.5">
                            <p class="font-medium text-base text-gray-800 dark:text-white/90">Rejected Reason</p>
                            <p class="text-gray-500 text-sm dark:text-gray-400">Fill this field if you want to reject this achievement</p>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <textarea class="textarea-input" wire:model="rejectedReason" rows="4"></textarea>
                            @error('rejectedReason')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif
            </div>
            @can('verify achievement')
                @if ($achievement->verification_status === 'On Process')
                    <div class="mt-8 flex items-center justify-end gap-x-2">
                        <button class="btn-outline-danger w-fit" wire:click="approveAchievement('Rejected')">Reject</button>
                        <button class="btn-success w-fit" wire:click="approveAchievement('Approved')">Approve</button>
                    </div>
                @endif
            @endcan
        @endif
    </div>
</div>
