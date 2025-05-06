<?php

namespace Modules\Master\Livewire\StudyProgram;

use Livewire\Attributes\On;
use Modules\Core\Abstracts\DataTable;
use Modules\Master\Models\StudyProgram;

class Table extends DataTable
{
    public function render()
    {
        $departments = StudyProgram::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('master::livewire.studyprogram.table', [
            'studyprograms' => $departments
        ]);
    }

    public function delete(string $id)
    {
        StudyProgram::destroy($id);

        $this->dispatch('studyprogram-deleted', message: 'Program studi berhasil dihapus!');
    }

    public function showUpdateModal(string $id)
    {
        $this->dispatch('studyprogram-show-update-modal', id: $id);
    }

    #[On('studyprogram-created')]
    #[On('studyprogram-updated')]
    public function onAction()
    {
        $this->resetPage();
    }
}
