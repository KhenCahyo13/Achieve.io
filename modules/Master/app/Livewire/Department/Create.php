<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Component;
use Modules\Master\Models\Department;

class Create extends Component
{
    public Form $form;

    public function render()
    {
        return view('master::livewire.department.create');
    }

    public function save()
    {
        $this->validate();

        Department::create([
            'name' => $this->form->name,
        ]);

        $this->form->reset();

        $this->dispatch('department-created', message: 'Department created successfully!');
    }
}
