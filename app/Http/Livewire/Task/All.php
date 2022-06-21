<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task ;
use App\Models\Project;
class All extends Component
{


    public function render()
    {

        $tasks  = Task::with('project')->get();

        return view('livewire.task.all', compact('tasks'));
    }
}
