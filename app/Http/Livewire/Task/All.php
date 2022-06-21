<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task ;
use App\Models\Project;
class All extends Component
{

    public $state = 1;

    public function render(){
        $tasks1  = Task::with('project')->get();
        return view('livewire.task.all', compact('tasks'));
    }
}
