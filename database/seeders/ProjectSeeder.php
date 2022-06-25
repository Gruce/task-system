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
        for($i = 1 ; $i <= 100 ; $i++){
            Project::create([
                'title' => 'Project ' . $i,
                'description' => 'Project ' . $i . ' description',
            ]);
        }

        $projects = Project::get();
        $employees = Employee::get();
        foreach($projects as $project)
            foreach ($employees as $employee)
                if(array_rand([true , false]))
                $project->employees()->attach([
                    'employee_id' => $employee->id
                ]);
    }
}
