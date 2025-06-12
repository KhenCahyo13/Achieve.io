<div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
    <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
        <!-- Form -->
        <div class="flex flex-col flex-1 w-full lg:w-1/2">
            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                <div>
                    {{-- Alert Message --}}
                    @if (session('error'))
                        <div class="mb-4">
                            <livewire:core::components.alert type="error" message="{{ session('error') }}" />
                        </div>
                    @elseif (session('success'))
                        <div class="mb-4">
                            <livewire:core::components.alert type="success" message="{{ session('success') }}" />
                        </div>
                    @endif
                    <div class="rounded-xl mb-4 border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15"
                        x-data="{
                            openAlert: false
                        }" x-on:login-failed.window="openAlert = true;" x-show="openAlert">
                        <div class="flex items-start gap-3">
                            <div class="text-error-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>

                            </div>

                            <div>
                                <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                    Error Message
                                </h4>

                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $errorMessage }}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- Form --}}
                    <div class="mb-5 sm:mb-8">
                        <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                            Sign In
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Enter your username and password to sign in!
                        </p>
                    </div>
                    <div>
                        <form wire:submit="login">
                            <div class="space-y-5">
                                <!-- Email -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Email <span class="text-error-500">*</span>
                                    </label>
                                    <input type="text" placeholder="Enter your email" class="text-input"
                                        wire:model="form.email" />
                                    @error('form.email')
                                        <span class="text-theme-xs text-error-500">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- Password -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Password<span class="text-error-500">*</span>
                                    </label>
                                    <div x-data="{ showPassword: false }" class="relative">
                                        <input :type="showPassword ? 'text' : 'password'"
                                            placeholder="Enter your password" class="password-input"
                                            wire:model="form.password" />
                                        <span @click="showPassword = !showPassword"
                                            class="absolute z-30 text-gray-500 -translate-y-1/2 cursor-pointer right-4 top-1/2 dark:text-gray-400">
                                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                            </svg>
                                        </span>
                                    </div>
                                    @error('form.password')
                                        <span class="text-theme-xs text-error-500">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- Checkbox -->
                                <div class="flex items-center justify-between">
                                    <div x-data="{ checkboxToggle: false }">
                                        <label for="checkboxLabelOne"
                                            class="flex items-center text-sm font-normal text-gray-700 cursor-pointer select-none dark:text-gray-400">
                                            <div class="relative">
                                                <input type="checkbox" id="checkboxLabelOne" class="sr-only"
                                                    @change="checkboxToggle = !checkboxToggle" />
                                                <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                                                    'bg-transparent border-gray-300 dark:border-gray-700'"
                                                    class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                                                    <span :class="checkboxToggle ? '' : 'opacity-0'">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                                                                stroke="white" stroke-width="1.94437"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            Keep me logged in
                                        </label>
                                    </div>
                                    <a href="{{ route('auth.forgot-password.index') }}"
                                        class="text-sm text-brand-500 hover:text-brand-600 dark:text-brand-400">Forgot
                                        password?</a>
                                </div>
                                <!-- Button -->
                                <div>
                                    <button type="submit" class="btn-primary w-full justify-center">
                                        Sign In
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5">
                            <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                                Don't have an account?
                                <a href="{{ route('auth.signup.index') }}"
                                    class="text-brand-500 hover:text-brand-600 dark:text-brand-400">Sign Up</a>
                            </p>
                        </div>
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
