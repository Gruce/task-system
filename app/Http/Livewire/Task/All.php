<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task as TaskModel;
class All extends Component
{
    public function render()
    {
        $tasks = TaskModel::get();
        return view('livewire.task.all', compact('tasks'));
    }
}
