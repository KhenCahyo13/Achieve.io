<div>
    @if ($type === 'success')
        <div
            class="rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15">
            <div class="flex items-start gap-3">
                <div class="text-success-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Success Message
                    </h4>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $message }}
                    </p>
                </div>
            </div>
        </div>
    @elseif ($type === 'info')
        <div
            class="rounded-xl border border-blue-light-500 bg-blue-light-50 p-4 dark:border-blue-light-500/30 dark:bg-blue-light-500/15">
            <div class="flex items-start gap-3">
                <div class="text-blue-light-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </div>

                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Info Message
                    </h4>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $message }}
                    </p>
                </div>
            </div>
        </div>
    @elseif ($type === 'warning')
        <div
            class="rounded-xl border border-warning-500 bg-warning-50 p-4 dark:border-warning-500/30 dark:bg-warning-500/15">
            <div class="flex items-start gap-3">
                <div class="text-warning-500 dark:text-orange-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>

                </div>

                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Warning Message
                    </h4>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $message }}
                    </p>
                </div>
            </div>
        </div>
    @elseif ($type === 'error')
        <div class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15">
            <div class="flex items-start gap-3">
                <div class="text-error-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                </div>

                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Error Message
                    </h4>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $message }}
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
