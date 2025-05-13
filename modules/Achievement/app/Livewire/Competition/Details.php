<?php

namespace Modules\Achievement\Livewire\Competition;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Achievement\Models\Competition;

class Details extends Component
{
    public string $id = '';

    public function render()
    {
        $competition = Competition::find($this->id);

        return view('achievement::livewire.competition.details', compact('competition'));
    }

    public function approveCompetition(string $value) {
        Competition::approveCompetition($this->id, $value);

        if ($value === 'Approved') {
            $this->dispatch('competition-approval', message: 'Competition approved successfully!');
        } else {
            $this->dispatch('competition-approval', message: 'Competition rejected successfully!');
        }
    }

    #[On('competition-show-details-modal')]
    public function setupData(string $id) {
        $this->id = $id;
    }
}
