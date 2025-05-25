<?php

namespace Modules\Achievement\Livewire\Achievement;

use Modules\Achievement\Models\Achievement;
use Modules\Core\Abstracts\DataTable;

class Table extends DataTable
{
    public function render()
    {
        $achievements = Achievement::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('achievement::livewire.achievement.table', compact('achievements'));
    }
}
