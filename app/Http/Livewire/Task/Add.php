<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\Task;

class Add extends Component
{
    use  LivewireAlert , WithFileUploads;

    public $task;
    public $files = [];

    protected $rules = [
        'title' => 'required',
        'importance' => 'required',
        'start_at' => 'required',
        'end_at' => 'required',
    ];

    public function add(){
        $this->validate();
        $task = TaskModel::create($this->task);

        if(count($this->files) > 0)
            foreach($this->files as $file){
                $new_file = $task->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name' , $file , 'tasks/' . $task->id . '/files/' . $new_file->id);
            }

        $this->emitTo('task.index' , '$refresh');
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function render(){
        return view('livewire.task.add');
    }
}
