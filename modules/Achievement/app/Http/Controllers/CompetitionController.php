<?php

namespace Modules\Achievement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Achievement\Models\Competition;
use Modules\Achievement\Models\CompetitionParticipant;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countAvailableCompetitions = Competition::getTotalAvailableCompetitions();
        $countFollowedCompetitions = CompetitionParticipant::getTotalFollowedCompetitions();

        return view('achievement::pages.competition.index', compact(
            'countAvailableCompetitions',
            'countFollowedCompetitions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('achievement::pages.competition.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('achievement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('achievement::pages.competition.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
