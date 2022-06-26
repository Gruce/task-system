<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class Tabs extends Component
{
    public $tabs;
    public $selectedTab;

    public function updatedSelectedTab($value){
        $this->emit('updatedSelectedTab', $value);
    }

    public function render(){
        return view('livewire.ui.tabs');
    }
}
