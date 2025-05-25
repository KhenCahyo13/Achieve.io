<?php

namespace Modules\Achievement\Livewire\Achievement;

use Livewire\Component;
use Modules\Achievement\Models\Competition;
use Modules\Master\Models\Period;
use Modules\Master\Models\User;

class Create extends Component
{
    public function render()
    {
        $lecturerUsers = User::withRole('Supervisor')->get();
        $competitions = Competition::all();
        $periods = Period::all();

        return view('achievement::livewire.achievement.create', compact('lecturerUsers', 'competitions', 'periods'));
    }
}
