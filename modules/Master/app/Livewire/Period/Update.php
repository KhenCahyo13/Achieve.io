<?php

namespace Modules\Master\Livewire\Period;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Master\Models\Period;

class Update extends Component
{
    public Form $form;

    public $id = '';

    public function render()
    {
        return view('master::livewire.period.update');
    }

    public function save()
    {
        $this->validate();

        $period = Period::find($this->id);

        if ($period) {
            $period->update([
                'title' => $this->form->title,
                'start_year' => $this->form->start_year,
                'end_year' => $this->form->end_year,
            ]);
        }

        $this->form->reset();

        $this->dispatch('period-updated', message: 'Period updated successfully!');
    }

    #[On('period-show-update-modal')]
    public function setupForm($id)
    {
        $period = Period::find($id);

        $this->id = $id;
        $this->form->title = $period->title;
        $this->form->start_year = $period->start_year;
        $this->form->end_year = $period->end_year;
    }
}
