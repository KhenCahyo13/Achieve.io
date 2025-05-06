<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Master\Models\Department;

class Update extends Component
{
    public DepartmentForm $form;
    public string $id = '';
    public function render()
    {
        return view('master::livewire.department.update');
    }

    public function save() {
        $this->validate();

        $department = Department::find($this->id);

        if ($department) {
            $department->update([
                'name' => $this->form->name
            ]);
        }

        $this->form->reset();

        $this->dispatch('department-updated', message: 'Jurusan berhasil diupdate!');
    }

    #[On('department-show-update-modal')]
    public function setupForm($id) {
        $department = Department::find($id);
        
        $this->id = $id;
        $this->form->name = $department->name;
    }    
}
