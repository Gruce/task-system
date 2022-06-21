<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task ;
use App\Models\Project;
class All extends Component
{
    public $state = 1;
    public function render()
    {

        $tasks = Project::with([
            'tasks' => function ($query) {
                return $query->where('state', $this->state);
            }
        ])->get();


        return view('livewire.task.all', compact('tasks'));
    }
}
