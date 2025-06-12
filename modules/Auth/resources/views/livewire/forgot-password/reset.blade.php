<div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
    <div class="flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
        <!-- Form -->
        <div class="flex flex-col flex-1 w-full lg:w-1/2">
            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                <div class="mb-5 sm:mb-8">
                    <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                        Reset Password
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Enter your new password below to reset it. Make sure to choose a strong password for better security.
                    </p>
                </div>
                <div>
                    <form wire:submit="resetPassword">
                        <div class="space-y-5">
                            <!-- New Password -->
                            <div class="form-groups">
                                <label class="form-label">
                                    New Password <span class="text-error-500">*</span>
                                </label>
                                <input type="password" id="new_password" name="new_password" placeholder="Enter your new password"
                                    class="text-input" wire:model="newPassword" />
                                @error('newPassword')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Confirm New Password -->
                            <div class="form-groups">
                                <label class="form-label">
                                    Confirm New Password <span class="text-error-500">*</span>
                                </label>
                                <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm your new password"
                                    class="text-input" wire:model="confirmPassword" />
                                @error('confirmPassword')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Button -->
                            <div>
                                <button wire:loading.attr="disabled" type="submit"
                                    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5">
                        <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                            Wait, I remember my password...
                            <a href="{{ route('auth.signin.index') }}"
                                class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Sign
                                In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
            <div class="flex items-center justify-center z-1">
                <!-- ===== Common Grid Shape Start ===== -->
                @include('auth::components.right-grids')
                <div class="flex flex-col items-center max-w-xs">
                    <img src="{{ asset('images/logo/logo-dark.svg') }}" alt="Logo" class="w-52 mb-4" />
                    <p class="text-center text-gray-400 dark:text-white/60">
                        Manage your achievements easily and efficiently
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
