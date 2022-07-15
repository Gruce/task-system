<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProjectsExport implements FromQuery, WithMapping,WithHeadings
{
    public function query()
    {
        return Project::query();
    }

    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Description',
            'Progress',
            'Completed Tasks',
            'Uncompleted Tasks',
            'Created At',
            'Done At',
        ];
    }

    public function map($project): array
    {
        return [
            $project->id,
            $project->title,
            $project->description,
            $project->percentage_completed_tasks != 0 ? $project->percentage_completed_tasks . '%' : '0%',
            $project->completed_tasks != 0 ? $project->completed_tasks : '0',
            $project->un_completed_tasks != 0 ? $project->un_completed_tasks : '0',
            date('Y-m-d' , strtotime($project->created_at)),
            $project->done ? date('Y-m-d' ,strtotime($project->change_at)) : '',
        ];
    }
}

