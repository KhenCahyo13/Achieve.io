<?php

namespace Modules\Auth\Livewire\SignIn;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Email is required.')]
    public string $email = '';

    #[Validate('required', message: 'Password is required.')]
    public string $password = '';
}
