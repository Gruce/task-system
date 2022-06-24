<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;

use App\Models\Project;

class All extends Component
{
    use WithPagination;
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
            ->paginate(25);

        return view('livewire.task.all', compact('tasks'));
    }
}
