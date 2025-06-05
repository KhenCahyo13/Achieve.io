<?php

namespace Modules\Achievement\Livewire\Achievement;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Achievement\Models\Achievement;
use Modules\Achievement\Notifications\AchievementApproval;
use Modules\Master\Models\User;

class Details extends Component
{
    #[Validate('required', message: 'Please provide a reason for rejection.')]
    public string $rejectedReason = '';

    public string $id = '';

    public function render()
    {
        $achievement = Achievement::with('student', 'period', 'participant', 'participant.competition', 'participant.lecturer', 'participant.leader', 'participant.members')->where('id', $this->id)->first();

        return view('achievement::livewire.achievement.details', compact('achievement'));
    }

    public function approveAchievement(string $value)
    {
        $achievement = Achievement::find($this->id);
        $student = User::find($achievement->student_id);

        try {
            DB::beginTransaction();

            if ($value === 'Approved') {
                Achievement::approveAchievement($this->id, $value);
                $this->dispatch('achievement-approval', message: 'Achievement approved successfully!');
            } else {
                $this->validate();

                Achievement::approveAchievement($this->id, $value, $this->rejectedReason);
                $this->dispatch('achievement-approval', message: 'Achievement rejected successfully!');
            }

            Notification::send($student, new AchievementApproval($achievement, $value));
            DB::commit();
        } catch (Exception $e) {
            Log::error('Error approving achievement: '.$e->getMessage());
            DB::rollBack();
        }
    }

    #[On('achievement-show-details-modal')]
    public function setupData(string $id)
    {
        $this->id = $id;
    }
}
