<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class All extends Component
{
    public $search;
    protected $listeners = ['$refresh', 'search'];

    public function search($value){
        $this->search = $value;
    }

    public function render()
    {
        $projects = Project::withCount(['tasks', 'files']);
        if($this->search) $projects = $projects->where('title', 'like', '%' . $this->search . '%');
        $projects = $projects->get();
        return view('livewire.project.all', compact('projects'));
    }
}
