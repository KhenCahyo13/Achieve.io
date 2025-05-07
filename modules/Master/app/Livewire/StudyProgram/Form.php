<?php

namespace Modules\Master\Livewire\StudyProgram;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StudyProgramForm extends Form
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:50', message: 'Name must be less than 50 characters')]
    public string $name = '';

    #[Validate('required', message: 'Department is required')]
    #[Validate('max:36', message: 'Department must be less than 36 characters')]
    public string $departmentId = '';
}
