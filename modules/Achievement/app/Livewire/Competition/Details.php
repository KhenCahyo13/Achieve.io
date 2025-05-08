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

    #[On('competition-show-details-modal')]
    public function setupData(string $id) {
        $this->id = $id;
    }
}
