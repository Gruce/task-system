<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public function render(){
        //get tasks from database
        $tasks = TaskModel::get();

        return view('livewire.task.task' , compact('tasks'));
    }
}
