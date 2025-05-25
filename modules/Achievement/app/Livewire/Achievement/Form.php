<?php

namespace Modules\Achievement\Livewire\Achievement;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Title is required')]
    #[Validate('max:150', message: 'Title must be less than 150 characters')]
    public string $title = '';

    #[Validate('required', message: 'Description is required')]
    #[Validate('max:255', message: 'Description must be less than 255 characters')]
    public string $description = '';

    #[Validate('required', message: 'Competition is required')]
    #[Validate('max:36', message: 'Competition must be less than 36 characters')]
    public string $participantId = '';

    #[Validate('required', message: 'Period is required')]
    #[Validate('max:36', message: 'Period must be less than 36 characters')]
    public string $periodId = '';
}
