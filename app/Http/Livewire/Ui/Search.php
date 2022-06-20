<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class Search extends Component
{
    public $search;
    protected $queryString = ['search'];
    
    public function updatedSearch(){
        $this->emit('search', $this->search);
    }

    public function render()
    {
        return view('livewire.ui.search');
    }
}
