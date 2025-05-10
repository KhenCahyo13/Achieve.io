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

    #[Validate('required', message: 'Poster is required')]
    public $poster;
}
