<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DepartmentForm extends Form
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:50', message: 'Name must be less than 50 characters')]
    public string $name = '';
}
