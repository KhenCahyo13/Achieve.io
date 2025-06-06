<?php

namespace Modules\Core\Livewire\Dashboard;

use Livewire\Component;
use Modules\Achievement\Models\Achievement;
use Modules\Achievement\Models\CompetitionParticipant;

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

        // For Lecturer
        $totalSupervisedAchievements = Achievement::getTotalSupervisedAchievements();
        $totalSupervisedStudents = CompetitionParticipant::getTotalSupervisedStudents();
        $totalSupervisedCompetitions = CompetitionParticipant::getTotalSupervisedCompetitions();

        return view('core::livewire.dashboard.page', compact('countPendingAchievements', 'countApprovedAchievements', 'countRejectedAchievements', 'totalAchievementsOnMonths', 'totalAchievementsBasedOnCompetitionCategory', 'totalAchievementsBasedOnCompetitionLevel', 'totalSupervisedAchievements', 'totalSupervisedStudents', 'totalSupervisedCompetitions'));
    }
}
