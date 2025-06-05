<?php

namespace Modules\Master\Livewire\RolePermissions;

use Modules\Core\Abstracts\DataTable;
use Modules\Master\Models\Role;

class Table extends DataTable
{
    public function render()
    {
        $rolePermissions = Role::getAll(
            $this->perPage ?? 10,
            $this->search,
            $this->sorts
        );

        return view('master::livewire.role-permissions.table', compact('rolePermissions'));
    }

    public function delete(string $id)
    {
        Role::destroy($id);

        $this->dispatch('rolepermissions-deleted', message: 'Role & Permissions deleted successfully!');
    }
}
