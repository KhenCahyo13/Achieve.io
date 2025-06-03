<div x-show="isShowNotification" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2" class="absolute top-4 right-4 z-50">
    @if ($type === 'success')
        <div
            class="flex items-center justify-between gap-3 w-full sm:max-w-[340px] rounded-md border-b-4 border-success-500 bg-white p-3 shadow-theme-sm dark:bg-[#1E2634]">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-lg text-success-600 dark:text-success-500 bg-success-50 dark:bg-success-500/[0.15]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <h4 class="sm:text-base text-sm text-gray-800 dark:text-white/90" x-text="notificationMessage"></h4>
            </div>
            <button class="text-gray-400 hover:text-gray-800 dark:hover:text-white/90"
                @click="isShowNotification = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @elseif ($type === 'error')
        <div
            class="flex w-full sm:max-w-[340px] items-center justify-between gap-3 rounded-md border-b-4 border-error-500 bg-white p-3 shadow-theme-sm dark:bg-[#1E2634]">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-error-50 text-error-600 dark:bg-error-500/[0.15] dark:text-error-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <h4 class="sm:text-base text-sm text-gray-800 dark:text-white/90" x-text="notificationMessage"></h4>
            </div>

            <button class="text-gray-400 hover:text-gray-800 dark:hover:text-white/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @elseif ($type === 'info')
        <div
            class="flex w-full sm:max-w-[340px] items-center justify-between gap-3 rounded-md border-b-4 border-blue-light-500 bg-white p-3 shadow-theme-lg dark:bg-[#1E2634]">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-light-50 text-blue-light-500 dark:bg-blue-light-500/[0.15] dark:text-blue-light-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </div>

                <h4 class="sm:text-base text-sm text-gray-800 dark:text-white/90" x-text="notificationMessage"></h4>
            </div>

            <!--  close btn  -->
            <button class="text-gray-400 hover:text-gray-800 dark:hover:text-white/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
</div>
