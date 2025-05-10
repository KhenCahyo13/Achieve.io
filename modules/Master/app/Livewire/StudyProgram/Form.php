<?php

namespace Modules\Master\Livewire\StudyProgram;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:150', message: 'Name must be less than 150 characters')]
    public string $name = '';

    #[Validate('required', message: 'Department is required')]
    #[Validate('max:36', message: 'Department must be less than 36 characters')]
    public string $departmentId = '';
}
