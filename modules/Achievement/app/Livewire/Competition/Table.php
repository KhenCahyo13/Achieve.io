<?php

namespace Modules\Achievement\Livewire\Competition;

use Modules\Core\Abstracts\DataTable;

class Table extends DataTable
{
    public function render()
    {
        return view('achievement::livewire.competition.table');
    }
}
