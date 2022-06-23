<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;

class Overview extends Component
{
    public $task;

    public function render()
    {
        return view('livewire.task.modal.overview');
    }
}
