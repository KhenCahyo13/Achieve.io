<?php

namespace Modules\Master\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Master\Models\User;

class Details extends Component
{
    use WithFileUploads;

    public int $refreshKey = 0;
    #[Validate('mimes:png,jpg,jpeg', message: 'Only JPG, JPEG, or PNG allowed')]
    #[Validate('max:2048', message: 'Profile picture size must be less than 2MB')]
    public $profilePicture;

    public function render()
    {
        $userWithDetails = null;

        if (!Auth::user()->hasRole('Admin')) {
            $userWithDetails = User::with('student', 'student.studyProgram')->find(Auth::id());
        } elseif (Auth::user()->hasRole('Lecturer')) {
            $userWithDetails = User::with('lecturer', 'lecturer.department')->find(Auth::id());
        }

        return view('master::livewire.profile.details', compact('userWithDetails'));
    }

    public function updateProfilePicture() {
        $this->validate();
        $user = User::find(Auth::id());

        $user->addMedia($this->profilePicture->getRealPath())->toMediaCollection('profile-picture');
        $this->profilePicture = null;
        $this->dispatch('profile-picture-updated', message: 'Profile picture updated successfully.');
    }

    public function showUpdatePersonalInformationModal()
    {
        $this->dispatch('profile-show-update-personal-information-modal');
    }

    #[On('profile-updated')]
    public function onAction()
    {
        $this->refreshKey++;
    }
}
