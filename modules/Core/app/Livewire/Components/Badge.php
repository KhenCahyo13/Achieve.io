<?php

namespace Modules\Core\Livewire\Components;

use Livewire\Component;

class Badge extends Component
{
    public string $type = '';
    public string $text = '';

    public function mount (string $type, string $text) {
        $this->type = $type;
        $this->text = $text;
    }

    public function render()
    {
        return view('core::livewire.components.badge');
    }
}
