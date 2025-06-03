<?php

namespace Modules\Master\Livewire\Profile;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:255', message: 'Name must be less than 255 characters')]
    public string $name = '';

    #[Validate('required', message: 'Email is required')]
    #[Validate('max:255', message: 'Email must be less than 255 characters')]
    public string $email = '';

    #[Validate('required', message: 'Phone number is required')]
    #[Validate('max:13', message: 'Phone number must be less than 13 characters')]
    public string $phoneNumber = '';

    #[Validate('required', message: 'Address is required')]
    #[Validate('max:255', message: 'Address must be less than 255 characters')]
    public string $address = '';

    #[Validate('required', message: 'Master number is required')]
    #[Validate('max:16', message: 'Master number must be less than 16 characters')]
    public string $masterNumber = '';

    #[Validate('required', message: 'Birth date is required')]
    public string $birthDate = '';

    #[Validate('required', message: 'Place is required')]
    #[Validate('max:36', message: 'Place must be less than 36 characters')]
    public string $placeId = '';
}
