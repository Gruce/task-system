<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class FilterProjects extends Component
{
    public $done = null;
    public function render()
    {
        $this->emit('filterProjects', $this->done);
        return view('livewire.ui.filter-projects');
    }
}
