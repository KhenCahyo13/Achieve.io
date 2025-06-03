<?php

namespace Modules\Achievement\Livewire\Competition;

use Livewire\Attributes\Validate;
use Livewire\Form as LivewireForm;

class Form extends LivewireForm
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('max:150', message: 'Name must be less than 150 characters')]
    public string $name = '';

    #[Validate('required', message: 'Description is required')]
    public string $description = '';

    #[Validate('required', message: 'Level is required')]
    #[Validate('in:Local,National,International', message: 'Level must be one of the predefined values')]
    public string $level = '';

    #[Validate('required', message: 'Category is required')]
    #[Validate('in:Team,Individual', message: 'Category must be one of the predefined values')]
    public string $category = '';

    #[Validate('required', message: 'Start Registration Date is required')]
    #[Validate('date', message: 'Start Registration Date must be a valid date')]
    public string $start_reg_date = '';

    #[Validate('required', message: 'End Registration Date is required')]
    #[Validate('date', message: 'End Registration Date must be a valid date')]
    #[Validate('after:start_reg_date', message: 'End Registration Date must be after Start Registration Date')]
    public string $end_reg_date = '';

    #[Validate('required', message: 'Competition Field is required')]
    #[Validate('min:1', message: 'At least one field must be selected')]
    public array $fields = [];
}
