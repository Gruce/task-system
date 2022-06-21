<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['$refresh', 'delete'];
    protected $rules = [
        'title' => 'required',
        'importance' => 'required',
        'start_at' => 'required',
        'end_at' => 'required',
    ];

    public $task, $ID;

    public function mount($task){
        $this->task = $task;
    }

    
    public function confirmed($id ){
        $this->ID = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'delete',
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
        $this->emitUp('$refresh');
    }

    public function edit(){
        $this->validate();
        $task = Task::findOrFail($this->ID);
        $task->edit([
            'title' => $this->title,
            'description' => $this->description,
            'importance' => $this->importance,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
        ]);

        $this->alert('success', 'تم التعديل', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render(){


        dg($this->task->toArray());
        return view('livewire.task.card');
    }
}
