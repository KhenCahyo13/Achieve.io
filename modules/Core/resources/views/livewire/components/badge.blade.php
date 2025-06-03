<div>
    @if ($type === 'primary')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-brand-50 px-2.5 py-0.5 text-sm font-medium text-brand-500 dark:bg-brand-500/15 dark:text-brand-400">
            {{ $text }}
        </span>
    @elseif ($type === 'success')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-success-50 px-2.5 py-0.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            {{ $text }}
        </span>
    @elseif ($type === 'error')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-error-50 px-2.5 py-0.5 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
            {{ $text }}
        </span>
    @elseif ($type === 'warning')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-warning-50 px-2.5 py-0.5 text-sm font-medium text-warning-600 dark:bg-warning-500/15 dark:text-orange-400">
            {{ $text }}
        </span>
    @elseif ($type === 'info')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-blue-light-50 px-2.5 py-0.5 text-sm font-medium text-blue-light-500 dark:bg-blue-light-500/15 dark:text-blue-light-500">
            {{ $text }}
        </span>
    @elseif ($type === 'light')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-700 dark:bg-white/5 dark:text-white/80">
            {{ $text }}
        </span>
    @elseif ($type === 'dark')
        <span
            class="inline-flex items-center justify-center gap-1 rounded-full bg-gray-500 px-2.5 py-0.5 text-sm font-medium text-white dark:bg-white/5 dark:text-white">
            {{ $text }}
        </span>
    @else
        <span>{{ $text }}</span>
    @endif
</div>