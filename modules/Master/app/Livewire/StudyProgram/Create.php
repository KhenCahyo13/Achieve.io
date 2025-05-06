<?php

namespace Modules\Master\Livewire\StudyProgram;

use Livewire\Component;
use Modules\Master\Models\Department;
use Modules\Master\Models\StudyProgram;

class Create extends Component
{
    public StudyProgramForm $form;

    public function render()
    {
        $departments = Department::all();

        return view('master::livewire.studyprogram.create', compact('departments'));
    }

    public function save() {
        $this->validate();

        StudyProgram::create([
            'department_id' => $this->form->departmentId,
            'name' => $this->form->name
        ]);

        $this->form->reset();

        $this->dispatch('studyprogram-created', message: 'Study program created successfully!');
    }
}
