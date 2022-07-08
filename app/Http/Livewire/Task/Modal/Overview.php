<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\{Project,Task , Employee};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Overview extends Component
{
    use WithPagination ,LivewireAlert;

    protected $listeners = ['$refresh'];

    public $task , $search , $employee_id ,$project_id ,$taskEmployees=[];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.description' => 'required',
    ];

    public function edit(){
        $project = Project::with('employees')->findOrFail($this->task['project_id']);

        $task_employee_ids = $this->task->employees()->get()->pluck('id')->toArray();

        $project_employee_ids = $project->employees->pluck('id')->toArray();

        $employee_ids = array_diff($task_employee_ids , $project_employee_ids);

        $project->employees()->attach($employee_ids);
        $this->task->save();

        $this->emitTo( 'task.all' , '$refresh');
        $this->emitTo('project.show.users' , '$refresh');

        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }


    public function render()
    {
        $projects = [];
        if($this->search){
            $search = '%' . $this->search . '%';
            $projects = Project::where('title' , 'LIKE' , $search)->paginate(24);
        }

        $employees = [];
        if($this->task){
            $employees = Employee::whereNotIn('id' , $this->task->employees->pluck('id'))->get();
        }

        return view('livewire.task.modal.overview' , [
            'projects' => $projects,
            'employees' => $employees,
        ]);
    }
}
