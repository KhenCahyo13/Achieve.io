<?php

namespace Modules\Achievement\Livewire\Competition;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Achievement\Models\Competition;
use Modules\Achievement\Models\Field;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'Poster is required')]
    #[Validate('mimes:png,jpg,jpeg', message: 'Only JPG, JPEG, or PNG allowed')]
    #[Validate('max:2048', message: 'Poster size must be less than 2MB')]
    public $poster;
    public Form $form;

    public function render()
    {
        $fields = Field::all();

        return view('achievement::livewire.competition.create', compact('fields'));
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            $createdCompetition = Competition::create([
                'name' => $this->form->name,
                'description' => $this->form->description,
                'level' => $this->form->level,
                'category' => $this->form->category,
                'start_reg_date' => $this->form->start_reg_date,
                'end_reg_date' => $this->form->end_reg_date,
                'created_by' => Auth::user()->id ?? null,
            ]);
            $createdCompetition->withFields($this->form->fields);
            $createdCompetition->addMedia($this->poster->getRealPath())->toMediaCollection('poster');

            $this->poster = null;
            $this->form->reset();

            $this->dispatch('competition-created', message: 'Competition created successfully!');
            DB::commit();
        } catch (Exception $e) {
            Log::error('Error while creating competition: ' . $e);
            DB::rollBack();
        }
    }
}
