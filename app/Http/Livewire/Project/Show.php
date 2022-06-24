<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class Show extends Component
{
    public $taskID;
    
    protected $listeners = ['$refresh', 'toggleModal'];

    public function toggleModal($task_id){
        $this->taskID = $task_id;
    }
    
    public function mount($id){
        $this->project = Project::with(['tasks' , 'files' , 'employees'])
                        ->withCount(['tasks' , 'files', 'employees'])
                        ->findOrFail($id);

    }
        
    public function render()
    {
        return view('livewire.project.show');
    }
}
