<?php

namespace Modules\Achievement\Livewire\Achievement;

use Livewire\Attributes\On;
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

    public function showDetailsModal(string $id)
    {
        $this->dispatch('achievement-show-details-modal', id: $id);
    }

    public function delete(string $id)
    {
        $achievement = Achievement::find($id);
        $achievement->delete();

        $this->dispatch('achievement-deleted', message: 'Achievement deleted successfully!');
    }

    public function showUpdateModal(string $id)
    {
        $this->dispatch('achievement-show-update-modal', id: $id);
    }

    #[On('achievement-created')]
    #[On('achievement-updated')]
    #[On('achievement-approval')]
    public function onAction()
    {
        $this->resetPage();
    }
}
