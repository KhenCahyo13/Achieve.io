<?php

namespace Modules\Master\Livewire\RolePermissions;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:50', message: 'Name must be less than 50 characters')]
    public string $name = '';

    #[Validate('max:255', message: 'Description must be less than 255 characters')]
    public string $description = '';

    public array $permissions = [];
}
