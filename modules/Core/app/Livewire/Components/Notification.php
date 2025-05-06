<?php

namespace Modules\Core\Livewire\Components;

use Livewire\Component;

class Notification extends Component
{
    public string $type = 'success';

    public function mount(string $type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('core::livewire.components.notification');
    }
}
