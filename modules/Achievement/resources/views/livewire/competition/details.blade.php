<div x-show="isDetailsModalOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="translate-x-full opacity-0"
    class="fixed left-0 top-0 z-99999 flex h-screen w-full flex-col items-center justify-between overflow-y-auto overflow-x-hidden bg-white p-6 dark:bg-gray-900 lg:p-10 transform">
    <!-- close btn -->
    <button @click="isDetailsModalOpen = false"
        class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                fill=""></path>
        </svg>
    </button>
    @if ($competition !== null)
        <div>
            <h4 class="mb-7 text-title-sm font-semibold text-gray-800 dark:text-white/90">
                {{ $competition->name }}
            </h4>
            <div class="flex flex-col gap-y-4 md:flex-row md:gap-x-6 lg:gap-x-8">
                <div class="w-full h-full">
                    <img src="{{ $competition->getFirstMediaUrl('poster') }}" alt="Poster" class="overflow-hidden rounded-lg">
                </div>
                <div class="flex flex-col">
                    {!! $competition->description !!}
                    <button class="btn-primary w-fit mt-4 lg:mt-8">Register Now</button>
                </div>
            </div>
        </div>
    @endif
</div>
