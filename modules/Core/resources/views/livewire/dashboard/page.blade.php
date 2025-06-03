<div class="flex flex-col gap-y-6">
    @include('core::livewire.dashboard.components.achievements-count-overview')

    @if (Auth::user()->hasRole('Admin'))
        @include('core::livewire.dashboard.components.charts.total-achievements-on-months')
    @endif
    
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @include('core::livewire.dashboard.components.charts.achievements-based-on-category')
        @include('core::livewire.dashboard.components.charts.achievements-based-on-level')
    </div>
</div>
