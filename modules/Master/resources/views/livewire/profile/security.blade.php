<div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div class="mb-4 flex flex-col gap-y-0.5 lg:mb-6">
            <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Security
            </h4>
            <p class="text-gray-500 text-sm dark:text-gray-400">Fill this form if you want to change your password</p>
        </div>
    </div>
    <form wire:submit="updatePassword">
        <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 md:gap-x-8">
            <div class="form-groups">
                <label class="form-label">
                    New Password <span class="text-red-500">*</span>
                </label>
                <input type="password" placeholder="Enter your new password" class="text-input" wire:model="password">
                @error('password')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-groups">
                <label class="form-label">
                    Confirm New Password <span class="text-red-500">*</span>
                </label>
                <input type="password" placeholder="Confirm your new password" class="text-input" wire:model="passwordConfirmation">
                @error('passwordConfirmation')
                    <span class="text-theme-xs text-error-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <button class="btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
