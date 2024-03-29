<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;

class Archived extends Component
{
    protected $listeners = ['$refresh'];
    public function render()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('livewire.task.archived', ['tasks' => $tasks]);
    }
}
