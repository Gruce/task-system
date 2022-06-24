<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;

class All extends Component
{
    use WithPagination;
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
                                $employee->limit(2);
                            }
                        ])
                    ->where('title' , 'LIKE' , $search)
                    ->orderByDesc('id')
                    ->paginate(24);

        return view('livewire.project.all', compact('projects'));
    }
}
