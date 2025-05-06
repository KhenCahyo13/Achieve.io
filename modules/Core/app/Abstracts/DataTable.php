<?php

namespace Modules\Core\Abstracts;

use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public array $sorts = [];

    public function sortBy(string $field)
    {
        if (isset($this->sorts[$field])) {
            $this->sorts[$field] = $this->sorts[$field] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sorts[$field] = 'asc';
        }
    }
}
