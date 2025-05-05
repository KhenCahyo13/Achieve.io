<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Form;
use Livewire\Attributes\Validate; 

class DepartmentForm extends Form
{
    #[Validate('required', message: 'Nama wajib diisi')]
    #[Validate('max:50', message: 'Maksimal 50 karakter')]
    public string $name = '';
}
