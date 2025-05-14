<?php

namespace Modules\Master\Livewire\Period;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Title is required')]
    #[Validate('max:100', message: 'Title must be less than 100 characters')]
    public string $title = '';

    #[Validate('required', message: 'Start year is required')]
    #[Validate('integer', message: 'Start year must be an integer')]
    #[Validate('digits:4', message: 'Start year must be 4 digits')]
    public string $start_year = '';
    
    #[Validate('required', message: 'End year is required')]
    #[Validate('integer', message: 'End year must be an integer')]
    #[Validate('digits:4', message: 'End year must be 4 digits')]
    public string $end_year = '';
}
