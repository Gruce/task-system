<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Project;
use App\Models\Task;



class Overview extends Component
{
    use LivewireAlert;

    protected $listeners = ['$refresh'];

    public $task;

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.description' => 'required',
    ];

    public function mount()
    {
        $this->projects = Project::get(['id' , 'title']);
    }

    public function edit_name(){
        $this->task->save();
        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo( 'task.all' ,'$refresh');
    }

    public function render()
    {
        return view('livewire.task.modal.overview');
    }
}
