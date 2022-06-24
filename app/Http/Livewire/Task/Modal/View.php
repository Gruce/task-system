<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Task;

class View extends Component
{
    public function mount(Task $task){
        $this->task = $task;
        $this->tabs = [
            [__('ui.overview'), 'overview', 'fa-solid fa-home'],
            [__('ui.files'), 'files', 'fa-solid fa-paperclip'],
            [__('ui.comments'), 'comments', 'fa-solid fa-comments'],
            [__('ui.users'), 'users', 'fa-solid fa-users'],
        ];
    }

    public function render(){
        return view('livewire.task.modal.view');
    }
}
