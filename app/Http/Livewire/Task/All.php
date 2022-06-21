<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task ;
use App\Models\Project;
class All extends Component
{
    public $search  , $state = 1;

    protected $listeners = ['$refresh' , 'search'];

    public function search($search){
        $this->search = $search;
    }

    public function render(){
        $search = '%' . $this->search . '%';
        $tasks  = Task::with('project')
                ->where('title' , 'like' , $search)
                ->where('state' , $this->state )
                ->get();
                if ($this->state) $tasks = $tasks->where('state', $this->state);
                


        return view('livewire.task.all', compact('tasks'));
    }
}
