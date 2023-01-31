<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class FilterTasks extends Component
{
    public $importance, $date;


    public function render()
    {
        $this->emit('filterTasks', $this->importance, $this->date);
        return view('livewire.ui.filter-tasks');
    }
}
