<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Employee;
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
        $this->task->employees()
            ->wherePivot('employee_id', $this->employee_id)
            ->detach();

        $this->sendNotification(
            $this->task->title,
            'ui.remove_in_task',
            $this->employee_id,
            $this->task->project->id,
        );
        $this->emitTo('notification.card', '$refresh');
        $this->emitSelf('$refresh');
        $this->emitTo('project.show.users', '$refresh');

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

        if ($this->task->employees()->wherePivot('employee_id', $this->userId)->exists()) {
            $this->alert('error', __('ui.data_already_exists'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);
            return;
        }

        $this->task->employees()->attach($this->userId);

        $this->sendNotification(
            $this->task->title,
            'ui.add_in_task',
            $this->userId,
            $this->task->project->id,
        );


        if (!$this->task->project->employees()->wherePivot('employee_id', $this->userId)->exists()) {
            $this->task->project->employees()->attach($this->userId);

            $this->sendNotification(
                $this->task->project->title,
                'ui.add_in_project',
                $this->userId,
                $this->task->project->id,
            );
        }
        $this->emitTo('notification.card', '$refresh');
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

    public function mount($task)
    {
        $this->task = $task;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();
        $task_employees = $this->task->employees()->get();

        return view('livewire.task.modal.users', [
            'employees' => $employees,
            'task_employees' => $task_employees,
        ]);
    }
}
