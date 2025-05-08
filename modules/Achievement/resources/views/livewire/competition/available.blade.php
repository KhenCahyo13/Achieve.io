<div class="flex flex-col gap-y-5 border-t border-gray-100 dark:border-gray-800 px-5 py-5 sm:px-6">
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @foreach ($competitions as $competition)
            @php
                $posterPath = $competition->getFirstMediaUrl('poster');
            @endphp
            <div
                class="flex flex-col gap-5 rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] sm:flex-row sm:items-center sm:gap-6">
                <div class="w-full h-32 overflow-hidden rounded-lg md:w-36">
                    <img src="{{ asset("$posterPath") }}" alt="Poster" class="overflow-hidden rounded-lg">
                </div>

                <div>
                    <h4 class="mb-1 text-theme-xl font-medium text-gray-800 dark:text-white/90">
                        {{ $competition->name }}
                    </h4>

                    <div class="mt-4 flex flex-wrap gap-x-1">
                        <livewire:core::components.badge type="light" text="{{ $competition->level }}" />
                        <livewire:core::components.badge type="light"
                            text="{{ $competition->category }} Competition" />
                    </div>

                    <button
                        wire:click="showDetailsModal('{{ $competition->id }}')"
                        class="mt-4 btn-icon-primary-transparent cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>                          

                        See Details
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
