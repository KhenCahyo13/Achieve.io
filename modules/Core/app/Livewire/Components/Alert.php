<?php

namespace Modules\Core\Livewire\Components;

use Livewire\Component;

class Alert extends Component
{
    public string $type = '';

    public string $message = '';

    public function mount(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return view('core::livewire.components.alert');
    }
}
