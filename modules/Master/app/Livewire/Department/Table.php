<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Models\Department;

class Table extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public array $sorts = [];

    public function render()
    {
        $departments = Department::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('master::livewire.department.table', [
            'departments' => $departments
        ]);
    }

    public function sortBy(string $field)
    {
        if (isset($this->sorts[$field])) {
            $this->sorts[$field] = $this->sorts[$field] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sorts[$field] = 'asc';
        }
    }
}
