<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ids from 1 to 10
        for($i = 1 ; $i <= 10 ; $i++){
            Project::create([
                'title' => 'Project ' . $i,
                'description' => 'Project ' . $i . ' description',
            ]);
        }

        $projects = Project::get();
        $employees = Employee::pluck('id');

        foreach($projects as $project)
            $project->employees()->attach($employees);
    }
}
