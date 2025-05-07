<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">{{ $pageName }}</h2>

    <nav>
        <ol class="flex items-center gap-1.5">
            @foreach($urls as $index => $url)
                <li class="text-sm text-gray-800 dark:text-white/90">
                    @if($url['link'])
                        <a href="{{ route($url['link']) }}" class="text-sm text-gray-500 dark:text-gray-400 hover:underline">{{ $url['name'] }}</a>
                    @else
                        {{ $url['name'] }}
                    @endif
                </li>

                @if(!$loop->last)
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3 text-gray-500 dark:text-white/70" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>