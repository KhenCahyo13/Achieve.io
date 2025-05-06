<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Attributes\On;
use Modules\Core\Abstracts\DataTable;
use Modules\Master\Models\Department;

class Table extends DataTable
{
    public function render()
    {
        $departments = Department::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('master::livewire.department.table', compact('departments'));
    }

    public function delete(string $id)
    {
        Department::destroy($id);

        $this->dispatch('department-deleted', message: 'Department deleted successfully!');
    }

    public function showUpdateModal(string $id)
    {
        $this->dispatch('department-show-update-modal', id: $id);
    }

    #[On('department-updated')]
    #[On('department-created')]
    public function onAction()
    {
        $this->resetPage();
    }
}
