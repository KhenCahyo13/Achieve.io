<?php

namespace Modules\Achievement\Livewire\Competition;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Achievement\Models\Competition;
use Modules\Core\Abstracts\DataTable;

class Available extends DataTable
{
    public function render()
    {
        $competitions = Competition::getAvailable(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts,
            $this->filters
        );

        return view('achievement::livewire.competition.available', compact('competitions'));
    }

    public function showDetailsModal(string $id)
    {
        $this->dispatch('competition-show-details-modal', id: $id);
    }

    #[On('competition-deleted')]
    #[On('competition-approval')]
    public function onAction()
    {
        $this->resetPage();
    }
}
