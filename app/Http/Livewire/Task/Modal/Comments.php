<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;

class Comments extends Component
{
    public $task, $comment;

    public function render()
    {
        return view('livewire.task.modal.comments');
    }
}
