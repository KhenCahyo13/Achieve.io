<?php

namespace Modules\Core\Livewire\Components;

use Livewire\Component;

class Breadcrumb extends Component
{
    public string $pageName;

    public array $urls;

    public function mount(string $pageName, array $urls)
    {
        $this->pageName = $pageName;
        $this->urls = $urls;
    }

    public function render()
    {
        return view('core::livewire.components.breadcrumb');
    }
}
