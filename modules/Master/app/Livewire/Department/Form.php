<?php

namespace Modules\Master\Livewire\Department;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:150', message: 'Name must be less than 150 characters')]
    public string $name = '';
}
