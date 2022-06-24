<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\DeleteTrait;

class View extends Component
{
    use LivewireAlert ,DeleteTrait;

    protected $listeners = ['$refresh' , 'delete'];

    public function mount(Task $task){
        $this->task = $task;
        $this->tabs = [
            [__('ui.overview'), 'overview', 'fa-solid fa-home'],
            [__('ui.files'), 'files', 'fa-solid fa-paperclip'],
            [__('ui.comments'), 'comments', 'fa-solid fa-comments'],
            [__('ui.users'), 'users', 'fa-solid fa-users'],
        ];
    }

    public function confirmed($id){
        // make sure add 'delete' to listeners
        $this->confirmedDelete(new Task , $id , ['task.all']);
    }

    public function render(){
        return view('livewire.task.modal.view');
    }
}
