<?php

namespace Modules\Achievement\Livewire\Achievement;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Achievement\Models\Achievement;
use Modules\Achievement\Models\CompetitionParticipant;
use Modules\Master\Models\Period;
use Modules\Master\Models\User;

class Update extends Component
{
    public $certificate;
    public string $oldCertificate;
    public Form $form;
    public string $id;

    public function render()
    {
        $lecturerUsers = User::withRole('Supervisor')->get();
        $competitions = CompetitionParticipant::getFollowedCompetitions(
            Auth::user()->id,
            100,
            ''
        );
        $periods = Period::all();

        return view('achievement::livewire.achievement.update', compact('lecturerUsers', 'competitions', 'periods'));
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            $achievement = Achievement::find($this->id);

            if ($this->certificate instanceof TemporaryUploadedFile) {
                $achievement->clearMediaCollection('certificate');
                $achievement->addMedia($this->certificate->getRealPath())->toMediaCollection('certificate');
            }

            $achievement->update([
                'title' => $this->form->title,
                'description' => $this->form->description,
                'participant_id' => $this->form->participantId,
                'period_id' => $this->form->periodId,
            ]);

            $this->certificate = null;
            $this->form->reset();

            $this->dispatch('achievement-updated', message: 'Achievement updated successfully!');
            DB::commit();
        } catch (\Exception $e) {
            Log::error('Error while updating achievement: ' . $e);
            DB::rollBack();
        }
    }

    #[On('achievement-show-update-modal')]
    public function showUpdateModal(string $id)
    {
        $this->id = $id;
        $achievement = Achievement::with('student', 'participant', 'period')->find($id);

        $this->form->title = $achievement->title;
        $this->form->description = $achievement->description;
        $this->form->participantId = $achievement->participant_id;
        $this->form->periodId = $achievement->period_id;
        $this->oldCertificate = $achievement->getFirstMediaUrl('certificate');
    }
}
