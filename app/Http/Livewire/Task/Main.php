<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;



class Main extends Component
{
    public function render()
    {

        $tasks = Task::get();
        //dd($tasks->toArray());

        return view('livewire.task.main', compact('tasks'));
    }
}
