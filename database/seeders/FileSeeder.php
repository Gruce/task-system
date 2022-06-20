<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\Project;
use App\Models\Task;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = Task::get();
        $projects = Project::get();

        $tasks->reduce(function($key , $task){
            $key = 1;
            if(array_rand([true , false]))
                $task->files()->create([
                    'name' => 'File ' . $key++,
                ]);
        });

        $projects->reduce(function($key , $project){
            $key = 1;
            if(array_rand([true , false]))
                $project->files()->create([
                    'name' => 'File ' . $key++,
                ]);
        });
    }
}
