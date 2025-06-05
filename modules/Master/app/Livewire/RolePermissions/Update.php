<?php

namespace Modules\Master\Livewire\RolePermissions;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Modules\Master\Models\Permission;
use Modules\Master\Models\Role;

class Update extends Component
{
    public string $id = '';
    public Form $form;

    public function mount(string $id)
    {
        $this->id = $id;
        $this->setupForm($id);
    }

    public function render()
    {
        $this->setupForm($this->id);

        return view('master::livewire.role-permissions.update');
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

            // Get Role
            $role = Role::find($this->id);
            $role->update([
                'name' => $this->form->name,
                'description' => $this->form->description,
            ]);
            $role->syncPermissions($this->form->permissions);

            $this->dispatch('rolepermissions-updated', message: 'Role & Permissions updated successfully!');
            $this->form->reset();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error updating role permissions: ' . $e->getMessage());
        }
    }

    public function setupForm(string $id)
    {
        $role = Role::with('permissions')->find($id);

        $this->form->name = $role->name;
        $this->form->description = $role->description ?? '';
        $this->form->permissions = $role->permissions->pluck('name')->toArray();
    }
}
