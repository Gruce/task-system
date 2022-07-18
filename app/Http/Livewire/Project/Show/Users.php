<?php

namespace App\Http\Livewire\Project\Show;

use App\Models\Employee;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use App\Traits\Livewire\NotificationTrait;

class Users extends Component
{
    use LivewireAlert, WithPagination, NotificationTrait;

    protected $listeners = ['$refresh', 'delete', 'load-more' => 'loadMore'];

    public $userId, $employee_id, $limitPerPage = 10;
    public $search;


    /* Addition
        After addition reset $userId, $search to null
    */

    public function confirmed($id, $function)
    {
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

    public function delete()
    {
        $project_id = $this->project->id;

        $employee = Employee::with(
            [
                'tasks' => function ($task) use ($project_id) {
                    return $task->where('project_id', $project_id);
                }
            ]
        )->findOrFail($this->employee_id);

        $task_ids = $employee->tasks->pluck('id')->toArray();

        $employee->tasks()->wherePivotIn('task_id', $task_ids)->detach();


        $this->project->employees()
            ->wherePivot('employee_id', $this->employee_id)
            ->detach();

        $this->sendNotification(
            $this->project->title,
            __('ui.remove_in_project') . " '" . $this->project->title . "'",
            $this->employee_id
        );

        $this->emitSelf('$refresh');
        $this->emitTo('task.modal.users', '$refresh');

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function add()
    {

        if ($this->project->employees()->wherePivot('employee_id', $this->userId)->exists()) {
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

        $this->sendNotification(
            $this->project->title,
            __('ui.add_in_project') . " '" . $this->project->title . "'",
            $this->userId
        );


        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 10;
    }

    public function mount($project)
    {
        $this->project = $project;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->paginate(10);

        $project_employees = $this->project->employees()->paginate($this->limitPerPage);

        return view('livewire.project.show.users', [
            'employees' => $employees,
            'project_employees' => $project_employees,
        ]);
    }
}
