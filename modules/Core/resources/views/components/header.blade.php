<header x-data="{ menuToggle: false }"
    class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white lg:border-b dark:border-gray-800 dark:bg-gray-900">
    <div class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6">
        <div
            class="flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-3 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4 dark:border-gray-800">
            <!-- Hamburger Toggle BTN -->
            <button
                :class="sidebarToggle ? 'lg:bg-transparent dark:lg:bg-transparent bg-gray-100 dark:bg-gray-800' : ''"
                class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg border-gray-200 text-gray-500 lg:h-11 lg:w-11 lg:border dark:border-gray-800 dark:text-gray-400"
                @click.stop="sidebarToggle = !sidebarToggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 hidden lg:block">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6" :class="sidebarToggle ? 'hidden' : 'block lg:hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>

                <!-- cross icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <!-- Hamburger Toggle BTN -->

            <a href="index.html" class="lg:hidden">
                <img class="w-36 dark:hidden" src="{{ asset('images/logo/logo-light.svg') }}" alt="Logo" />
                <img class="w-36 hidden dark:block" src="{{ asset('images/logo/logo-dark.svg') }}" alt="Logo" />
            </a>

            <!-- Application nav menu button -->
            <button
                class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 lg:hidden dark:text-gray-400 dark:hover:bg-gray-800"
                :class="menuToggle ? 'bg-gray-100 dark:bg-gray-800' : ''" @click.stop="menuToggle = !menuToggle">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z"
                        fill="" />
                </svg>
            </button>
            <!-- Application nav menu button -->
        </div>

        <div :class="menuToggle ? 'flex' : 'hidden'"
            class="shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 lg:flex lg:justify-end lg:px-0 lg:shadow-none">
            <div class="2xsm:gap-3 flex items-center gap-2">
                <!-- Dark Mode Toggler -->
                <button
                    class="hover:text-dark-900 relative flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                    @click.prevent="darkMode = !darkMode">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 hidden dark:block">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 dark:hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
                <!-- Dark Mode Toggler -->

                {{-- Notification Area --}}
                <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                    <button
                        class="hover:text-dark-900 relative flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                        @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                        @if (auth()->user()->unreadNotifications->count() > 0)
                            <span class="flex absolute top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-red-500">
                                <span
                                    class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-red-500 opacity-75"></span>
                            </span>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>

                    <!-- Dropdown Start -->
                    <div x-show="dropdownOpen"
                        class="shadow-theme-lg dark:bg-gray-dark absolute -right-[240px] mt-[17px] flex h-[480px] w-[350px] flex-col rounded-2xl border border-gray-200 bg-white p-3 sm:w-[361px] lg:right-0 dark:border-gray-800">
                        <div class="mb-3 flex justify-between border-b border-gray-100 pb-3 dark:border-gray-800">
                            <div class="flex flex-col">
                                <h5 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                    Notification
                                </h5>
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    <span
                                        class="text-theme-sm font-normal text-gray-500 dark:text-gray-400">{{ auth()->user()->unreadNotifications->count() }}
                                        unread</span>
                                @endif
                            </div>

                            <button @click="dropdownOpen = false"
                                class="text-gray-500 dark:text-gray-400 flex items-start">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                                        fill="" />
                                </svg>
                            </button>
                        </div>
                        <ul class="custom-scrollbar flex h-auto flex-col overflow-y-auto gap-y-2">
                            @forelse (auth()->user()->notifications as $notification)
                                <li>
                                    <a @class([
                                        'flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5',
                                        'bg-brand-50 dark:bg-gray-700' => $notification->read_at === null,
                                    ])
                                        href="{{ route('core.notification.mark-as-read', $notification->id) }}">
                                        <span
                                            class="z-1 flex items-center justify-center h-11 w-full max-w-11 rounded-full border border-gray-200 dark:border-gray-800">
                                            <span
                                                class="uppercase dark:text-gray-200">{{ $notification->data['message'][0] }}</span>
                                        </span>

                                        <span class="block">
                                            <span class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                <span
                                                    class="font-medium text-gray-800 dark:text-white/90">{{ $notification->data['title'] }}
                                                    -</span>
                                                {{ $notification->data['message'] }}
                                            </span>

                                            <span
                                                class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            @empty
                                <li class="text-center">
                                    <span class="text-sm text-gray-400">Notifications not found</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- User Area -->
            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a class="flex items-center text-gray-700 dark:text-gray-400" href="#"
                    @click.prevent="dropdownOpen = ! dropdownOpen">
                    <span
                        class="mr-3 h-11 w-11 flex items-center justify-center overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                        <span class="uppercase">{{ auth()->user()->name[0] }}</span>
                    </span>

                    <span class="text-theme-sm mr-1 block font-medium capitalize">{{ auth()->user()->name }}</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </a>

                <!-- Dropdown Start -->
                <div x-show="dropdownOpen"
                    class="shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800">
                    <div>
                        <span class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400 capitalize">
                            {{ auth()->user()->name }}
                        </span>
                        <span class="text-theme-xs mt-0.5 block text-gray-500 dark:text-gray-400">
                            {{ auth()->user()->email }}
                        </span>
                    </div>

                    <ul class="flex flex-col gap-1 border-b border-gray-200 pt-2 pb-2 dark:border-gray-800">
                        <li>
                            <a href="{{ route('master.profile.index') }}"
                                class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Profile
                            </a>
                        </li>
                    </ul>
                    <a href="{{ route('auth.signout.action') }}"
                        class="group text-theme-sm mt-2 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>

                        Sign out
                    </a>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>
