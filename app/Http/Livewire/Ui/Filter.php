<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class Filter extends Component
{
    public $currentFilter = 1;
    public function render()
    {
        $this->emit('currentFilter', $this->currentFilter);
        return view('livewire.ui.filter');
    }
}
