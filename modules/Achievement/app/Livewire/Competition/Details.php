<?php

namespace Modules\Achievement\Livewire\Competition;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Achievement\Models\Competition;
use Modules\Achievement\Models\CompetitionParticipant;
use Modules\Achievement\Notifications\CompetitionApproval;
use Modules\Master\Models\User;

class Details extends Component
{
    public string $id = '';

    public function render()
    {
        $competition = Competition::find($this->id);
        $registeredUsers = CompetitionParticipant::getRegisteredUsers($this->id);

        return view('achievement::livewire.competition.details', compact('competition', 'registeredUsers'));
    }

    public function approveCompetition(string $value, string $createdBy)
    {
        $competition = Competition::find($this->id);
        $createdByUser = User::find($createdBy);

        try {
            DB::beginTransaction();
            Competition::approveCompetition($this->id, $value);

            if ($value === 'Approved') {
                $this->dispatch('competition-approval', message: 'Competition approved successfully!');
            } else {
                $this->dispatch('competition-approval', message: 'Competition rejected successfully!');
            }

            Notification::send($createdByUser, new CompetitionApproval($competition, $value));
            DB::commit();
        } catch (Exception $e) {
            Log::error('Error approving competition: ' . $e->getMessage());
            DB::rollBack();
        }
    }

    public function showRegisterModal(string $competitionId)
    {
        $this->dispatch('competition-show-register-modal', competitionId: $competitionId);
    }

    #[On('competition-show-details-modal')]
    public function setupData(string $id)
    {
        $this->id = $id;
    }
}
