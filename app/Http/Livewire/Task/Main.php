<?php

namespace App\Http\Livewire\Task;

use App\Models\Task as TaskModel;
use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        //get tasks from database
        $tasks = TaskModel::get();
        return view('livewire.task.main', compact('tasks'));
    }
}
