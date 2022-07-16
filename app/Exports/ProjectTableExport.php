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
        $project = Project::findOrFail($this->id);
        return view('exports.project-table', ['project' => $project]);
    }
}
