<?php

namespace Modules\Achievement\Livewire\Competition;

use Illuminate\Support\Facades\Auth;
use Modules\Achievement\Models\CompetitionParticipant;
use Modules\Core\Abstracts\DataTable;

class Followed extends DataTable
{
    public function render()
    {
        $competitions = CompetitionParticipant::getFollowedCompetitions(
            Auth::user()->id,
            $this->perPage,
            $this->search
        );

        return view('achievement::livewire.competition.followed', compact('competitions'));
    }
}
