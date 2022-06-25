<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    public $search, $project;

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
            ->with(
                [
                    'project:id,title',
                    'employees' => fn($employee) => $employee->with('user:id,name'),
                    'files'
                ]
            )
            ->where('title', 'LIKE', $search)
            ->orderByDesc('updated_at');

        if (!$this->project) $tasks->orWhereRelation('project', 'title', 'LIKE', $search);

        if ($this->project) $tasks->where('project_id', $this->project->id);

        // dd($tasks->get()->toArray());
        $tasks = $tasks->paginate(24);

        return view('livewire.task.all', compact('tasks'));
    }
}
