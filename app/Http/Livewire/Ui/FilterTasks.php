<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class FilterTasks extends Component
{
    public $importance;
    public function render()
    {
        $this->emit('filterTasks', $this->importance);
        return view('livewire.ui.filter-tasks');
    }
}
