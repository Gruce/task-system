<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class All extends Component
{
    protected $listeners = ['$refresh'];

    public function render()
    {
        $projects = Project::withCount(['tasks', 'files'])->get();
        return view('livewire.project.all', compact('projects'));
    }
}
