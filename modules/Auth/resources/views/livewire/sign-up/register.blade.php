<div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
    <div class="flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
        <!-- Form -->
        <div class="flex flex-col flex-1 w-full lg:w-1/2">
            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                <div class="mb-4" x-data="{
                    showAlert: false,
                }" x-show="showAlert" x-on:registration-success.window="showAlert = true; setTimeout(() => showAlert = false, 10000)">
                    <livewire:core::components.alert type="success"
                        message="Register successfully! Please check your email to activate your account" />
                </div>
                <div class="mb-5 sm:mb-8">
                    <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                        Sign Up
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Fill out the form below to create your account!
                    </p>
                </div>
                <div>
                    <form wire:submit="save">
                        <div class="space-y-5">
                            <!-- Fullname -->
                            <div class="form-groups">
                                <label class="form-label">
                                    Fullname <span class="text-error-500">*</span>
                                </label>
                                <input type="text" id="fullname" name="fullname" placeholder="Enter your fullname"
                                    class="text-input" wire:model="form.fullname" />
                                @error('form.fullname')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="form-groups">
                                <label class="form-label">
                                    Email <span class="text-error-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" placeholder="Enter your email"
                                    class="text-input" wire:model="form.email" />
                                @error('form.email')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="form-groups">
                                <label class="form-label">
                                    Password <span class="text-error-500">*</span>
                                </label>
                                <div x-data="{ showPassword: false }" class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" placeholder="Enter your password"
                                        class="password-input" wire:model="form.password" />
                                    <span @click="showPassword = !showPassword"
                                        class="absolute z-30 text-gray-500 -translate-y-1/2 cursor-pointer right-4 top-1/2 dark:text-gray-400">
                                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </span>
                                </div>
                                @error('form.password')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Button -->
                            <div>
                                <button wire:loading.attr="disabled" type="submit"
                                    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5">
                        <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                            Already have an account?
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
