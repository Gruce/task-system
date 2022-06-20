<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class Card extends Component
{
    public $task;

    public function mount($task){
        $this->task = $task;
    }

    public function render(){
        dg($this->task->toArray());
        return view('livewire.task.card');
    }
}
