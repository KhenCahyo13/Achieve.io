<?php

namespace Modules\Achievement\Livewire\Achievement;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Achievement\Models\Achievement;
use Modules\Achievement\Models\CompetitionParticipant;
use Modules\Master\Models\Period;
use Modules\Master\Models\User;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'Certificate is required')]
    #[Validate('mimes:png,jpg,jpeg', message: 'Only JPG, JPEG, or PNG allowed')]
    #[Validate('max:2048', message: 'Certificate size must be less than 2MB')]
    public $certificate;
    public Form $form;

    public function render()
    {
        $lecturerUsers = User::withRole('Supervisor')->get();
        $competitions = CompetitionParticipant::getFollowedCompetitions(
            Auth::user()->id,
            100,
            ''
        );
        $periods = Period::all();

        return view('achievement::livewire.achievement.create', compact('lecturerUsers', 'competitions', 'periods'));
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            $createdAchievement = Achievement::create([
                'student_id' => Auth::user()->id,
                'participant_id' => $this->form->participantId,
                'period_id' => $this->form->periodId,
                'title' => $this->form->title,
                'description' => $this->form->description,
                'verification_status' => 'On Process',
            ]);
            $createdAchievement->addMedia($this->certificate->getRealPath())->toMediaCollection('certificate');

            $this->certificate = null;
            $this->form->reset();

            $this->dispatch('achievement-created', message: 'Achievement created successfully!');
            DB::commit();
        } catch (\Exception $e) {
            Log::error('Error while creating achievement: ' . $e);
            DB::rollBack();
        }
    }
}
