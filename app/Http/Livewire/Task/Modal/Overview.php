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

    public $task , $search ,$taskEmployees = [] , $employee_id;

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.description' => 'required',
    ];

    public function edit(){
        $this->task->save();

        //$this->task->employees()->sync(array_keys($this->taskEmployees));
        // foreach($this->taskEmployees as $employee){
        //     dd($this->taskEmployees );
        //     if(!$task->project->employees()->wherePivot('employee_id' , $employee['id'])->exists())
        //         $task->project->employees()->attach($employee['id']);

        // }

        // foreach($this->task->employees as $employee){
        //     if(!$task->project->employees()->wherePivot('employee_id' , $employee->id)->exists())
        //     $task->project->employees()->attach($employee->id);
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

        return view('livewire.task.modal.overview' , [
            'projects' => $projects,
        ]);
    }
}
