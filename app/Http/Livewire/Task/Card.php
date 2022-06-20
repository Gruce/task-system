<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh', 'delete'];
    public $task, $task_id;

    public function mount($task){
        $this->task = $task;
    }

    public function delete(){
        Task::findOrFail($this->task_id)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitUp('$refresh');
    }


    public function confirmed($id)
    {
        $this->task_id = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'delete',
        ]);
    }

    public function render(){
        dg($this->task->toArray());
        return view('livewire.task.card');
    }
}
