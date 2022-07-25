<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;

class All extends Component
{
    use WithPagination;
    protected $listeners = ['$refresh', 'search', 'filterProjects'];
    public $search, $done;

    public function search($search)
    {
        $this->search = $search;
    }

    public function filterProjects($done)
    {
        $this->done = $done;
    }



    public function render()
    {
        $search = '%' . $this->search . '%';

        if (is_admin()) {
            $projects = Project::withCount(['tasks', 'files', 'employees'])
                ->with([
                    'employees' => fn ($employee) => $employee->limit(2),
                ])
                ->where('title', 'LIKE', $search)
                ->orderBy('done')->orderByDesc('id');
        } else {
            $projects = is_employee()->projects()
                ->withCount(['tasks', 'files', 'employees'])
                ->with([
                    'employees' => fn ($employee) => $employee->limit(2),
                ])
                ->where('title', 'LIKE', $search)
                ->orderBy('done')->orderByDesc('id');
        }

        if ($this->done) $projects->where('done', $this->done);

        $projects = $projects->paginate(24);

        return view('livewire.project.all', compact('projects'));
    }
}
