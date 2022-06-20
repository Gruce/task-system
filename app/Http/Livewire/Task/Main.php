<?php

namespace App\Http\Livewire\Task;

use App\Models\Task as TaskModel;
use Livewire\Component;
use App\Models\Project;

class Main extends Component
{
    public function render()
    {

        $tasks = TaskModel::get();
        //dd($tasks->toArray());

        return view('livewire.task.main', compact('tasks'));
    }
}
