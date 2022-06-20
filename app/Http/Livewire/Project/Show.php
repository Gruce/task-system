<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;

class Show extends Component
{
    public function mount($id){
        dd($id);
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}
