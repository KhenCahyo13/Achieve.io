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

    public array $filters = [];

    public function sortBy(string $field)
    {
        if (isset($this->sorts[$field])) {
            $this->sorts[$field] = $this->sorts[$field] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sorts[$field] = 'asc';
        }
    }

    public function setFilters(string $field, $value)
    {
        if (empty($value)) {
            unset($this->filters[$field]);
        } else {
            $this->filters[$field] = $value;
        }
    }
}
