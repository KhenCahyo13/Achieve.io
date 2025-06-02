<?php

namespace Modules\Core\Livewire\Dashboard;

use Livewire\Component;
use Modules\Achievement\Models\Achievement;

class Page extends Component
{
    public function render()
    {
        $countPendingAchievements = Achievement::getTotalPendingAchievements();
        $countApprovedAchievements = Achievement::getTotalApprovedAchievements();
        $countRejectedAchievements = Achievement::getTotalRejectedAchievements();
        $totalAchievementsOnMonths = Achievement::getTotalAchievementsOnMonths();
        $totalAchievementsBasedOnCompetitionCategory = Achievement::getTotalAchievementsBasedOnCompetitionCategory();
        $totalAchievementsBasedOnCompetitionLevel = Achievement::getTotalAchievementsBasedOnCompetitionLevel();

        return view('core::livewire.dashboard.page', compact('countPendingAchievements', 'countApprovedAchievements', 'countRejectedAchievements', 'totalAchievementsOnMonths', 'totalAchievementsBasedOnCompetitionCategory', 'totalAchievementsBasedOnCompetitionLevel'));
    }
}
