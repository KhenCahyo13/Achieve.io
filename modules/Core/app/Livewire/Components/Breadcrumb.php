<?php

namespace Modules\Core\Livewire\Components;

use Livewire\Component;

class Breadcrumb extends Component
{
    public string $pageName;

    public function mount(string $pageName) {
        $this->pageName = $pageName;
    }

    public function render()
    {
        return view('core::livewire.components.breadcrumb');
    }
}
