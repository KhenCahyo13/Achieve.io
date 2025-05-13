<?php

namespace Modules\Achievement\Livewire\Competition;

use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Achievement\Models\Competition;
use Modules\Achievement\Models\CompetitionParticipant;
use Modules\Achievement\Notifications\InvitedToCompetition;
use Modules\Master\Models\User;

class Register extends Component
{
    #[Validate('required', message: 'Leader is required')]
    #[Validate('max:36', message: 'Leader must be less than 36 characters')]
    public string $leaderId = '';

    #[Validate('required', message: 'Supervisor is required')]
    #[Validate('max:36', message: 'Supervisor must be less than 36 characters')]
    public string $lecturerId = '';

    #[Validate('required', message: 'Competition is required')]
    #[Validate('max:36', message: 'Competition must be less than 36 characters')]
    public string $competitionId = '';

    #[Validate('required', message: 'Team name is required')]
    #[Validate('max:100', message: 'Team name must be less than 100 characters')]
    public string $teamName = '';

    #[Validate('required', message: 'Topic title is required')]
    #[Validate('max:255', message: 'Topic title must be less than 255 characters')]
    public string $topicTitle = '';

    public array $members = [];

    public function render()
    {
        $studentUsers = User::withRole('Student')->get();
        $lecturerUsers = User::withRole('Supervisor')->get();
        $competition = Competition::find($this->competitionId);

        return view('achievement::livewire.competition.register', compact('studentUsers', 'lecturerUsers', 'competition'));
    }

    public function save()
    {
        $this->validate();

        $competition = Competition::find($this->competitionId);
        
        if ($competition && $competition->category === 'Team') {
            $this->validate([
                'members' => [
                    'required',
                    'array',
                    'min:1'
                ]
            ], [
                'members.required' => 'Members is rqeuired',
                'members.min' => 'At least one member is required'
            ]);
        }

        $competitionParticipant = CompetitionParticipant::create([
            'leader_id' => $this->leaderId,
            'lecturer_id' => $this->lecturerId,
            'competition_id' => $this->competitionId,
            'team_name' => $this->teamName,
            'topic_title' => $this->topicTitle
        ]);

        if ($competition && $competition->category === 'Team') {
            $competitionParticipant->withMembers($this->members);

            $members = User::whereIn('id', $this->members)->get();

            Notification::send($members, new InvitedToCompetition($competition));
        }

        $this->reset(['leaderId', 'lecturerId', 'competitionId', 'teamName', 'topicTitle', 'members']);
        $this->dispatch('competition-participant-created', message: 'Register successfully!');
    }

    #[On('competition-show-register-modal')]
    public function onRegisterModalOpen(string $competitionId)
    {
        $this->competitionId = $competitionId;
    }
}
