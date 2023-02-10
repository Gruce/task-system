<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    public $search, $project, $employee, $importance, $date;

    protected $listeners = ['$refresh', 'search', 'filterTasks', 'taskMoved'];

    public function search($search)
    {
        $this->search = $search;
    }
    public function filterTasks($importance, $date)
    {
        $this->importance = $importance;
        $this->date = $date;
    }

    public function taskMoved($value)
    {
        $type = $value['type'];
        $id = $value['id'];
        Task::findOrFail($id)->update([
            'state' => $type,
            'change_at' => date('Y-m-d')
        ]);
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (is_admin()) {

            $tasks = Task::withCount(['files', 'employees'])
                ->with([
                    'employees' => fn ($employee) => $employee->limit(2),
                ])
                ->where('title', 'LIKE', $search)
                ->orderBy('importance')->orderByDesc('id');
        } else {
            $tasks = is_employee()->tasks()
                ->withCount(['files', 'employees'])
                ->with([
                    'employees' => fn ($employee) => $employee->limit(2),
                ])
                ->where('title', 'LIKE', $search)
                ->orderBy('importance')->orderByDesc('id');
        }

        // if (!$this->project && !$this->importance) $tasks->orWhereRelation('project', 'title', 'LIKE', $search);

        if ($this->project) $tasks->where('project_id', $this->project->id);

        if ($this->employee) $tasks = $this->employee->tasks();

        if ($this->importance) $tasks->where('importance', $this->importance);

        if ($this->date) $tasks->where('start_at', date('Y-m-d', strtotime($this->date)));

        $tasks = $tasks->paginate(24);

        return view('livewire.task.all', compact('tasks'));
    }
}
