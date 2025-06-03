<?php

namespace Modules\Master\Livewire\Period;

use Livewire\Component;
use Modules\Master\Models\Period;

class Create extends Component
{
    public Form $form;

    public function render()
    {
        return view('master::livewire.period.create');
    }

    public function save()
    {
        $this->validate();

        Period::create([
            'title' => $this->form->title,
            'start_year' => $this->form->start_year,
            'end_year' => $this->form->end_year,
        ]);

        $this->form->reset();

        $this->dispatch('period-created', message: 'Period created successfully!');
    }
}
