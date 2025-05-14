<?php

namespace Modules\Master\Livewire\Period;

use Livewire\Attributes\On;
use Modules\Core\Abstracts\DataTable;
use Modules\Master\Models\Period;

class Table extends DataTable
{
    public function render()
    {
        $periods = Period::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('master::livewire.period.table', compact('periods'));
    }

    public function delete(string $id)
    {
        Period::destroy($id);

        $this->dispatch('period-deleted', message: 'Period deleted successfully!');
    }

    public function showUpdateModal(string $id)
    {
        $this->dispatch('period-show-update-modal', id: $id);
    }

    #[On('period-created')]
    #[On('period-updated')]
    public function onAction()
    {
        $this->resetPage();
    }
}
