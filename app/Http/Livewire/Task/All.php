<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;

class All extends Component
{
    public $search;

    protected $listeners = ['$refresh', 'search', 'taskMoved'];

    public function search($search)
    {
        $this->search = $search;
    }

    public function taskMoved($value){
        $type = $value['type'];
        $id = $value['id'];
        Task::findOrFail($id)->update([
            'state' => $type
        ]);
        
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $tasks  = Task::withCount('files')
            ->where('title', 'like', $search)
            ->orderByDesc('id')
            ->get();

        return view('livewire.task.all', compact('tasks'));
    }
}
