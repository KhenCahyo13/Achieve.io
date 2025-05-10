<?php

namespace Modules\Achievement\Livewire\Competition;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Modules\Achievement\Models\Competition;

class Update extends Component
{
    use WithFileUploads;

    public Form $form;
    public string $id = '';
    public string $oldPoster;

    public function mount(string $id)
    {
        $this->id = $id;
        $this->setupForm($id);
    }

    public function render()
    {
        $this->setupForm($this->id);
        return view('achievement::livewire.competition.update');
    }

    public function save()
    {
        $this->validate();

        $competition = Competition::find($this->id);

        if ($this->form->poster instanceof TemporaryUploadedFile) {
            $competition->clearMediaCollection('poster');
            $competition->addMedia($this->form->poster->getRealPath())->toMediaCollection('poster');
        }

        $competition->update([
            'name' => $this->form->name,
            'description' => $this->form->description,
            'level' => $this->form->level,
            'category' => $this->form->category,
        ]);

        $this->form->reset();

        $this->dispatch('competition-updated', message: 'Competition updated successfully!');
    }

    public function setupForm(string $id)
    {
        $competition = Competition::find($id);

        $this->form->name = $competition->name;
        $this->form->level = $competition->level;
        $this->form->category = $competition->category;
        $this->form->description = $competition->description;
        $this->oldPoster = $competition->getFirstMediaUrl('poster');
    }
}
