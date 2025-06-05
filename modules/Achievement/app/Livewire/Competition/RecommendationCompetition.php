<?php

namespace Modules\Achievement\Livewire\Competition;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Achievement\Models\Competition;
use Modules\Achievement\Models\Field;
use Modules\Master\Models\Department;

class RecommendationCompetition extends Component
{
    #[Validate('required', message: 'Department is required')]
    public string $department = '';

    #[Validate('required', message: 'Interest Field is required')]
    public string $interestField = '';

    #[Validate('required', message: 'Skill Level is required')]
    public string $skillLevel = '';

    #[Validate('required', message: 'Like Teamworks is required')]
    public string $likeTeamworks = '';

    #[Validate('required', message: 'Number of Championships is required')]
    public string $numberOfChampionships = '';

    #[Validate('required', message: 'Number of Participants is required')]
    public string $numberOfParticipants = '';

    public $competitions = [];
    public $fallbackMessage = 'Fill the form first to get competition recommendations';

    public function render()
    {
        $departments = Department::all()->pluck('name');
        $fields = Field::all()->pluck('name');

        return view('achievement::livewire.competition.recommendation-competition', compact('departments', 'fields'));
    }

    public function showDetailsModal(string $id)
    {
        $this->dispatch('competition-show-details-modal', id: $id);
    }

    public function getRecommendation()
    {
        $this->validate();

        try {
            $payload = [
                $this->department,
                $this->interestField,
                $this->skillLevel,
                $this->likeTeamworks,
                $this->numberOfChampionships,
                $this->numberOfParticipants
            ];
            $request = Http::post('http://localhost:8000/predict/competition-recommendation', [
                'features' => $payload
            ]);

            $receivedResponse = $request->json();
            $recommendationField = $receivedResponse['data'];
            $splittedRecommendationField = explode(' | ', $recommendationField);
            $formattedLevel = $splittedRecommendationField[2] === 'Beginner' ? 'Local' : ($splittedRecommendationField[2] === 'Intermediate' ? 'National' : 'International');

            $recommendedCompetitions = Competition::getRecommendedCompetitions(
                $splittedRecommendationField[0],
                $splittedRecommendationField[1],
                $formattedLevel
            );

            if (count($recommendedCompetitions) === 0) {
                $this->fallbackMessage = 'No competitions found for the given criteria.';
            } else {
                $this->competitions = $recommendedCompetitions;
            }
        } catch (Exception $e) {
            Log::error('Error fetching recommendations: ' . $e->getMessage());
        }
    }
}
