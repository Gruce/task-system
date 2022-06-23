<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\Task;
use App\Models\Project;


class Add extends Component
{
    use  LivewireAlert, WithFileUploads;

    // public $task, $title , $description , $importance , $project_id,$start_at,$end_at;
    public $task;
    public $files = [];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.importance' => 'required',
        'task.start_at' => 'required',
        'task.end_at' => 'required',
    ];

    public function mount()
    {
        $this->task['start_at'] = date('Y-m-d');
        $this->task['end_at'] = date('Y-m-d');
        $this->projects = Project::get(['id', 'title']);
    }

    public function removeFile($index)
    {
        unset($this->files[$index]);
    }

    public function add(Task $task)
    {
        dg($this->task);
        $this->validate();

        // $data = [
        //     'title' => $this->title,
        //     'project_id' => $this->project_id,
        //     'description' => $this->description,
        //     'importance' => $this->importance,
        //     'start_at' => $this->start_at,
        //     'end_at' => $this->end_at,
        // ];
        $task->create($this->task);

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $task->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'tasks/' . $task->id . '/files/' . $new_file->id);
            }

        $this->emitTo('task.main', '$refresh');
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }


    public function render()
    {

        return view('livewire.task.add');
    }
}
