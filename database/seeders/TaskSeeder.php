<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::get();

        foreach ($projects as $project)
            for ($i = 1; $i <= 5; $i++) {
                $task = Task::create([
                    'title' => 'title ' . $i ,
                    'project_id' => $project->id,
                    'description' => 'description',
                    'state' => rand(1, 3),
                    'start_at' => date('Y-m-d'),
                    'end_at' => date('Y-m-d'),
                    'importance' => rand(1,3),
                ]);

                $task->labels()->createMany([
                    [
                        'name' => 'label ' . $i,
                        'color' => '#ff000' . $i,
                    ],
                ]);
            }

        $tasks = Task::get();
        $employees = Employee::get();
        foreach ($tasks as $task)
            foreach ($employees as $employee)
                if (array_rand([true, false]) && array_rand([true, false]))
                    $task->employees()->attach([
                        'employee_id' => $employee->id
                    ]);
    }
}
