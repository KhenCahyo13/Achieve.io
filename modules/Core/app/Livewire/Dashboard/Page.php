<?php

namespace Modules\Core\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Achievement\Models\Achievement;

class Page extends Component
{
    public function render()
    {
        $countPendingAchievements = Achievement::where('verification_status', 'On Process')->count();
        $countApprovedAchievements = Achievement::where('verification_status', 'Approved')->count();
        $countRejectedAchievements = Achievement::where('verification_status', 'Rejected')->count();
        $totalAchievementsBasedOnCompetitionCategory = Achievement::getTotalAchievementsBasedOnCompetitionCategory();
        $totalAchievementsBasedOnCompetitionLevel = Achievement::getTotalAchievementsBasedOnCompetitionLevel();

        return view('core::livewire.dashboard.page', compact('countPendingAchievements', 'countApprovedAchievements', 'countRejectedAchievements', 'totalAchievementsBasedOnCompetitionCategory', 'totalAchievementsBasedOnCompetitionLevel'));
    }
}
