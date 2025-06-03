<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
    <div class="card p-5 md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 dark:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-blue-500 dark:text-white/90">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
        </div>

        <div class="mt-4 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Achievements Waiting Verification</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ $countPendingAchievements }}</h4>
            </div>
        </div>
    </div>
    <div class="card p-5 md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-green-500 dark:text-white/90">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-4 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Achievements Approved</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ $countApprovedAchievements }}</h4>
            </div>
        </div>
    </div>
    <div class="card p-5 md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 dark:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-red-500 dark:text-white/90">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-4 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Achievements Rejected</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ $countRejectedAchievements }}</h4>
            </div>
        </div>
    </div>
</div>
