<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;

class Users extends Component
{
    public $task, $search;

    public function render()
    {
        return view('livewire.task.modal.users');
    }
}
