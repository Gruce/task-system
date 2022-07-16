<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectTableExport implements FromView
{
    public $id;
    public function __construct($project)
    {
        $this->id = $project->id;
    }


    public function view(): View
    {
        $id = $this->id;
        $project = Project::with([
            'tasks',
            'employees' => function ($employee) use ($id) {
                $employee->withCount(['tasks' => function ($query) use ($id) {
                    $query->where('project_id', $id);
                }]);
            },
        ])->findOrFail($this->id);


        $tasks = $project->tasks;
        $employees = $project->employees;


        return view('exports.project-table', [
            'project' => $project,
            'tasks' => $tasks,
            'employees' => $employees,
        ]);
    }
}
