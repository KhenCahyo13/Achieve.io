<?php

namespace Modules\Achievement\Livewire\Competition;

use Modules\Achievement\Models\Competition;
use Modules\Core\Abstracts\DataTable;

class Table extends DataTable
{
    public function render()
    {
        $competitions = Competition::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('achievement::livewire.competition.table', compact('competitions'));
    }

    public function delete(string $id)
    {
        $competition = Competition::find($id);
        $competition->delete();

        $this->dispatch('competition-deleted', message: 'Competition deleted successfully!');
    }
}
