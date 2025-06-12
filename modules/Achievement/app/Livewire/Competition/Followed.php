<?php

namespace Modules\Achievement\Livewire\Competition;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Modules\Achievement\Models\CompetitionParticipant;
use Modules\Core\Abstracts\DataTable;

class Followed extends DataTable
{
    public int $refreshKey = 0;

    public function render()
    {
        $competitions = CompetitionParticipant::getFollowedCompetitions(
            Auth::user()->id,
            $this->perPage,
            $this->search
        );

        return view('achievement::livewire.competition.followed', compact('competitions'));
    }

    #[On('competition-participant-created')]
    public function increaseRefreshKey()
    {
        $this->refreshKey++;
    }
}
