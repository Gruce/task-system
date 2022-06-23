<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class All extends Component
{
    protected $listeners = ['$refresh' , 'search'];
    public $search;

    public function search($search){
        $this->search = $search;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $projects = Project::withCount(['tasks', 'files' , 'employees'])
                    ->with(
                        [
                            'employees'=> function($employee){
                                $employee->limit(3);
                            }
                        ])
                    ->where('title' , 'LIKE' , $search)
                    ->orderByDesc('id')
                    ->get();

        return view('livewire.project.all', compact('projects'));
    }
}
