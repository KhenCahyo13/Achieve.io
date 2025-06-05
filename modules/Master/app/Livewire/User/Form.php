<?php

namespace Modules\Master\Livewire\User;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Name field is required')]
    #[Validate('max:255', message: 'Name must be less than 255 characters')]
    public string $name = '';

    #[Validate('required', message: 'Email field is required')]
    #[Validate('email', message: 'Email must be a valid email address')]
    #[Validate('max:255', message: 'Email must be less than 255 characters')]
    public string $email = '';

    #[Validate('required', message: 'Role field is required')]
    public string $role = '';

    #[Validate('required', message: 'Password field is required')]
    #[Validate('min:8', message: 'Password must be at least 8 characters')]
    #[Validate('max:255', message: 'Password must be less than 255 characters')]
    public string $password = '';

    #[Validate('required', message: 'Password confirmation is required')]
    #[Validate('same:password', message: 'Password confirmation must match the password')]
    public string $passwordConfirmation = '';
}
