<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Models\Department;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        $departments = Department::paginate(10);

        return view('master::livewire.department.table', [
            'departments' => $departments
        ]);
    }
}
