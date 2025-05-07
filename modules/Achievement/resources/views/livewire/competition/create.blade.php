<div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="px-5 py-4 sm:px-6 sm:py-5">
        <form action="" class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2 lg:grid-cols-3">
            <div class="flex flex-col gap-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Name <span class="text-red-500">*</span>
                </label>
                <input type="text" placeholder="Competition name" class="text-input" wire:model="form.name">
                @error('form.name')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </form>
    </div>
</div>
