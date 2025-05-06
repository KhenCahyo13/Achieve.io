<?php

namespace Modules\Master\Livewire\StudyProgram;

use Livewire\Form;
use Livewire\Attributes\Validate; 

class StudyProgramForm extends Form
{
    #[Validate('required', message: 'Nama wajib diisi')]
    #[Validate('max:50', message: 'Maksimal 50 karakter')]
    public string $name = '';
    
    #[Validate('required', message: 'Department wajib diisi')]
    #[Validate('max:36', message: 'Maksimal 36 karakter')]
    public string $departmentId = '';
}
