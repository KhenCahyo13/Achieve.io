<?php

namespace Modules\Master\Livewire\RolePermissions;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Modules\Master\Models\Permission;
use Modules\Master\Models\Role;

class Create extends Component
{
    public Form $form;

    public function render()
    {
        return view('master::livewire.role-permissions.create');
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            // Create Permissions first
            foreach ($this->form->permissions as $permission) {
                Permission::updateOrCreate([
                    'name' => $permission,
                ], [
                    'name' => $permission,
                ]);
            }

            // Create Role
            $createdRole = Role::create([
                'name' => $this->form->name,
                'description' => $this->form->description,
            ]);
            $createdRole->givePermissionTo($this->form->permissions);

            $this->dispatch('rolepermissions-created', message: 'Role & Permissions created successfully!');
            $this->form->reset();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating role permissions: '.$e->getMessage());
        }
    }
}
