<?php

namespace Modules\Auth\Livewire\SignUp;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Fullname is required')]
    #[Validate('max:255', message: 'Fullname must be less than 255 characters')]
    public string $fullname = '';

    #[Validate('required', message: 'Email is required')]
    #[Validate('email', message: 'Email must be a valid email address')]
    #[Validate('max:255', message: 'Email must be less than 255 characters')]
    public string $email = '';

    #[Validate('required', message: 'Password is required')]
    #[Validate('min:8', message: 'Password must be at least 8 characters')]
    #[Validate('max:255', message: 'Password must be less than 255 characters')]
    public string $password = '';
}
