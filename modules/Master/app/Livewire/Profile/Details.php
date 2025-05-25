<?php

namespace Modules\Master\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Master\Models\User;

class Details extends Component
{
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
}
