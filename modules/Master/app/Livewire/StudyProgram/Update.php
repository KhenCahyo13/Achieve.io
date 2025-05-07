<?php

namespace Modules\Master\Livewire\StudyProgram;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Master\Models\Department;
use Modules\Master\Models\StudyProgram;

class Update extends Component
{
    public StudyProgramForm $form;

    public $id = '';

    public function render()
    {
        $departments = Department::all();

        return view('master::livewire.studyprogram.update', compact('departments'));
    }

    public function save()
    {
        $this->validate();

        $studyprogram = StudyProgram::find($this->id);

        if ($studyprogram) {
            $studyprogram->update([
                'name' => $this->form->name,
                'department_id' => $this->form->departmentId,
            ]);
        }

        $this->form->reset();

        $this->dispatch('studyprogram-updated', message: 'Study program updated successfully!');
    }

    #[On('studyprogram-show-update-modal')]
    public function setupForm($id)
    {
        $studyprogram = StudyProgram::find($id);

        $this->id = $id;
        $this->form->name = $studyprogram->name;
        $this->form->departmentId = $studyprogram->department->id;
    }
}
