<?php

namespace Modules\Achievement\Livewire\Achievement;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Achievement\Models\Achievement;

class Details extends Component
{
    public string $id = '';

    public function render()
    {
        $achievement = Achievement::with('student', 'period', 'participant', 'participant.competition', 'participant.lecturer', 'participant.leader', 'participant.members')->where('id', $this->id)->first();

        return view('achievement::livewire.achievement.details', compact('achievement'));
    }

    #[On('achievement-show-details-modal')]
    public function setupData(string $id)
    {
        $this->id = $id;
    }
}
