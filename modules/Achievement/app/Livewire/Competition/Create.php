<?php

namespace Modules\Achievement\Livewire\Competition;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Achievement\Models\Competition;

class Create extends Component
{
    use WithFileUploads;

    public Form $form;

    public function render()
    {
        return view('achievement::livewire.competition.create');
    }

    public function save()
    {
        $this->validate();

        $createdCompetition = Competition::create([
            'name' => $this->form->name,
            'description' => $this->form->description,
            'level' => $this->form->level,
            'category' => $this->form->category,
            'start_reg_date' => $this->form->start_reg_date,
            'end_reg_date' => $this->form->end_reg_date,
            'start_date' => $this->form->start_date,
            'end_date' => $this->form->end_date,
            'created_by' => Auth::user()->id ?? null,
        ]);
        $createdCompetition->addMedia($this->form->poster->getRealPath())->toMediaCollection('poster');

        $this->form->reset();

        $this->dispatch('competition-created', message: 'Competition created successfully!');
    }
}
