<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class Show extends Component
{
    public $project;

    public function mount(Project $id){
        $this->project = $id;
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}
