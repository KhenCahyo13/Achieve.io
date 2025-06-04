<?php

namespace Modules\Achievement\Livewire\Competition;

use Livewire\Component;

class RecommendationCompetition extends Component
{
    public $competitions = [];

    public function render()
    {
        return view('achievement::livewire.competition.recommendation-competition');
    }
}
