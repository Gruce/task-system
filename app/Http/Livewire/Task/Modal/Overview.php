<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Overview extends Component
{
    use WithPagination;

    protected $listeners = ['$refresh'];

    public $task , $search;

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.description' => 'required',
    ];

    public function render()
    {
        $projects = [];
        if($this->search){
            $search = '%' . $this->search . '%';
            $projects = Project::where('title' , 'LIKE' , $search)->paginate(24);
        }

        return view('livewire.task.modal.overview' , [
            'projects' => $projects,
        ]);
    }
}
