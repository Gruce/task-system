<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\{WithFileUploads, WithPagination};
use App\Models\{Task, Project, Employee};
use App\Notifications\NewTask;

class Add extends Component
{
    use  LivewireAlert, WithFileUploads, WithPagination;

    public $task, $search;
    public $files = [];

    protected $listeners = ['$refresh',];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.importance' => 'required',
        'task.start_at' => 'required',
        'task.end_at' => 'required',
        'task.description' => 'required',
    ];

    public function mount()
    {
        $this->task['start_at'] = date('Y-m-d');
        $this->task['end_at'] = date('Y-m-d');
    }

    public function removeFile($index)
    {
        unset($this->files[$index]);
    }

    public function add()
    {
        $this->validate();
        $task = Task::create($this->task);

        //auth()->user()->notify(new NewTask($task));

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $task->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'tasks/' . $task->id . '/files/' . $new_file->id);
            }
        $this->emitTo('task.all', '$refresh');
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
        $projects = [];
        $search = '%' . $this->search . '%';
        if ($this->search) {
            $projects = Project::where('title', 'LIKE', $search)->paginate(24);
        }

        return view('livewire.task.add', [
            'projects' => $projects,
        ]);
    }
}
