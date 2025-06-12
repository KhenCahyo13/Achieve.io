<div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
    <div class="flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
        <!-- Form -->
        <div class="flex flex-col flex-1 w-full lg:w-1/2">
            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                <div class="mb-4" x-data="{
                    showAlert: false,
                    alertType: 'success',
                    message: ''
                }" x-show="showAlert"
                    x-on:forgot-password-success.window="showAlert = true; alertType = 'success'; message = $event.detail.message; setTimeout(() => showAlert = false, 10000)"
                    x-on:forgot-password-error.window="showAlert = true; alertType = 'error'; message = $event.detail.message; setTimeout(() => showAlert = false, 10000)">
                    <div
                        :class="alertType === 'success'
                            ?
                            'rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15' :
                            'rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15'">
                        <div class="flex items-start gap-3">
                            <template x-if="alertType === 'success'">
                                <div class="text-success-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                            </template>
                            <template x-if="alertType === 'error'">
                                <div class="text-error-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </div>
                            </template>

                            <div>
                                <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                    <template x-if="alertType === 'success'">
                                        <span>Success Message</span>
                                    </template>
                                    <template x-if="alertType === 'error'">
                                        <span>Error Message</span>
                                    </template>
                                </h4>

                                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="message"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 sm:mb-8">
                    <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                        Forgot Password
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Enter the email address linked to your account, and we’ll send you a link to reset your
                        password.
                    </p>
                </div>
                <div>
                    <form wire:submit="sendLink">
                        <div class="space-y-5">
                            <!-- Email -->
                            <div class="form-groups">
                                <label class="form-label">
                                    Email <span class="text-error-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" placeholder="Enter your email"
                                    class="text-input" wire:model="email" />
                                @error('email')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Button -->
                            <div>
                                <button wire:loading.attr="disabled" type="submit"
                                    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                    Send Reset Link
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
