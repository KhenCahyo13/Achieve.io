<?php

namespace Modules\Master\Livewire\User;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Core\Abstracts\DataTable;
use Modules\Master\Models\User;

class Table extends DataTable
{
    public function render()
    {
        $users = User::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('master::livewire.user.table', compact('users'));
    }

    #[On('user-created')]
    public function onAction()
    {
        $this->resetPage();
    }
}
