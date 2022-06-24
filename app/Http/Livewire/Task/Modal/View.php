<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class View extends Component
{
    use LivewireAlert;

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

    public function confirmed($id, $function){
        $this->ID = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => $function,
        ]);
    }

    public function delete(){
        Task::findOrFail($this->ID)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo( 'task.all' ,'$refresh');
    }

    public function render(){
        return view('livewire.task.modal.view');
    }
}
