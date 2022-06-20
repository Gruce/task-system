<?php

namespace Database\Seeders;

use App\Models\Project;
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

        $projects->reduce(function($key , $project){
            $key = 1;
            $project->tasks()->create([
                'title' => 'title ' . $key++,
                'description' => 'description',
                'start_at' => date('Y-m-d'),
            ]);

            $project->tasks()->create([
                'title' => 'title ' . $key,
                'description' => 'description',
                'start_at' => date('Y-m-d'),
            ]);
        });

    }
}
