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
        $this->task->save();
        //$this->task->employees->pluck('id');
       // dd($taskEmployees);
    // add user to project if it is not exists
        foreach ($this->task->employees as $employee) {
            if(!in_array($employee->id,$this->task)){
                $this->task->employees()->detach($employee->id);
            }
        }

        // $this->task->employees()->attach(array_keys($this->taskEmployees));

        // foreach($this->taskEmployees as $employee){
        //     if(!$task->project->employees()->wherePivot('project_id' , $employee['id'])->exists())
        //         $task->project->employees()->attach($employee['id']);
        // }


        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo( 'task.all' , '$refresh');
    }


    public function render()
    {
        $projects = [];
        if($this->search){
            $search = '%' . $this->search . '%';
            $projects = Project::where('title' , 'LIKE' , $search)->paginate(24);
        }
        $employees = [];
        //$taskEmployees = $this->task->employees->pluck('id');
        //get employees that are not assigned to task
        if($this->task){
            $employees = Employee::whereNotIn('id' , $this->task->employees->pluck('id'))->get();
        }
        
         //$employees = Employee::whereIn('id', array_keys($this->taskEmployees))->paginate(10);
        // $this->taskEmployees = $this->task->employees->pluck('id');
        // //dd($employees->toArray());
        //dd($taskEmployees);

        return view('livewire.task.modal.overview' , [
            'projects' => $projects,
            'employees' => $employees,

        ]);
    }
}
