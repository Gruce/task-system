<?php

namespace App\Http\Livewire\Project\Show;

use App\Models\Employee;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;


class Users extends Component
{
    use LivewireAlert , WithPagination;

    protected $listeners = ['$refresh' , 'delete' ,'load-more' => 'loadMore'];

    public $userId , $employee_id, $limitPerPage = 10;
    public $search;


    /* Addition
        After addition reset $userId, $search to null
    */

    public function confirmed($id, $function){
        $this->employee_id = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => $function,
        ]);
    }

    public function delete(){
        $this->project->employees()
                        ->wherePivot('employee_id' , $this->employee_id)
                        ->detach();

        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function add(){

        if($this->project->employees()->wherePivot('employee_id' , $this->userId)->exists()){
            $this->alert('error', __('ui.data_already_exists'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);
            return;
        }

        $this->project->employees()
        ->attach($this->userId);

        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function loadMore(){
        $this->limitPerPage = $this->limitPerPage + 10;
    }

    public function mount($project){
        $this->project = $project;
    }

    public function render(){
        $search = '%' . $this->search . '%';

        $employees = Employee::whereRelation('user' , 'name' , 'LIKE' , $search)->paginate(10);

        $project_employees = $this->project->employees()->paginate($this->limitPerPage);

        return view('livewire.project.show.users' , [
            'employees' => $employees,
            'project_employees' => $project_employees,
        ]);
    }
}
