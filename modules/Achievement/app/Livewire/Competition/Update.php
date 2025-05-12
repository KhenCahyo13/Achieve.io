<?php

namespace Modules\Achievement\Livewire\Competition;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Modules\Achievement\Models\Competition;
use Modules\Achievement\Models\Field;

class Update extends Component
{
    use WithFileUploads;

    public Form $form;
    public string $id = '';
    public string $oldPoster;
    public $poster;

    public function mount(string $id)
    {
        $this->id = $id;
        $this->setupForm($id);
    }

    public function render()
    {
        $fields = Field::all();

        $this->setupForm($this->id);
        return view('achievement::livewire.competition.update', compact('fields'));
    }

    public function save()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $competition = Competition::find($this->id);

            if ($this->poster instanceof TemporaryUploadedFile) {
                $competition->clearMediaCollection('poster');
                $competition->addMedia($this->poster->getRealPath())->toMediaCollection('poster');
            }

            $competition->update([
                'name' => $this->form->name,
                'description' => $this->form->description,
                'level' => $this->form->level,
                'category' => $this->form->category,
                'start_reg_date' => $this->form->start_reg_date,
                'end_reg_date' => $this->form->end_reg_date,
            ]);
            $competition->withFields($this->form->fields);

            $this->poster = null;
            $this->form->reset();

            $this->dispatch('competition-updated', message: 'Competition updated successfully!');
            DB::commit();
        } catch (Exception $e) {
            Log::error('Error while updating competition: ' . $e);
            DB::rollBack();
        }
    }

    public function setupForm(string $id)
    {
        $competition = Competition::with('fields')->find($id);

        $this->form->name = $competition->name;
        $this->form->level = $competition->level;
        $this->form->category = $competition->category;
        $this->form->description = $competition->description;
        $this->form->start_reg_date = $competition->start_reg_date;
        $this->form->end_reg_date = $competition->end_reg_date;
        $this->form->fields = $competition->fields->pluck('id')->toArray();
        $this->oldPoster = $competition->getFirstMediaUrl('poster');
    }
}
