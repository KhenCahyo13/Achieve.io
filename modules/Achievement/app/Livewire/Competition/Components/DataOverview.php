<?php

namespace Modules\Achievement\Livewire\Competition\Components;

use Livewire\Component;
use Modules\Achievement\Models\Competition;

class DataOverview extends Component
{
    public function render()
    {
        $countPendingCompetitions = Competition::getTotalPendingCompetitions();
        $countApprovedCompetitions = Competition::getTotalApprovedCompetitions();
        $countRejectedCompetitions = Competition::getTotalRejectedCompetitions();

        return view('achievement::livewire.competition.components.data-overview', compact(
            'countPendingCompetitions',
            'countApprovedCompetitions',
            'countRejectedCompetitions'
        ));
    }
}
