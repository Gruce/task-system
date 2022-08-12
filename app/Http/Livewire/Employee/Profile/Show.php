<?php

namespace App\Http\Livewire\Employee\Profile;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Show extends Component
{
    use LivewireAlert, WithFileUploads;
    public $state, $photo, $tasks, $taskID, $todo_tasks, $file_id,  $in_progress_tasks, $done_tasks;

    protected $listeners = ['$refresh', 'toggleModal', 'delete'];

    public function toggleModal($task_id)
    {
        $this->taskID = $task_id;
    }



    public function mount($id)
    {
        $this->employee = Employee::with(['tasks', 'files', 'user'])
            ->withCount(['tasks', 'files', 'projects'])
            ->findOrFail($id);

        $this->tasks = $this->employee->tasks()->get();

        $this->todo_tasks = $this->tasks->where('state', 1)->count();
        $this->in_progress_tasks = $this->tasks->where('state', 2)->count();
        $this->done_tasks = $this->tasks->where('state', 3)->count();

        //projects count
        $this->projects = $this->employee->projects()->get();
        $this->projects_done_count = $this->projects->where('done', true)->count();
        $this->projects_not_done_count = $this->projects->where('done', false)->count();
    }


    public function confirmed($id, $function)
    {
        $this->file_id = $id;
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
        $this->employee->files()->findOrFail($this->file_id)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitSelf('$refresh');
    }


    public function updatedPhoto($photo)
    {
        $this->employee->user->add_file('profile_photo_path', $photo, 'users/' . $this->employee->user->id . '/profile_photo/');
        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function state()
    {
        $this->employee->state = !$this->employee->state;
        $this->employee->save();
        $msg = !$this->employee->state ? 'ui.the_account_has_been_disabled' : 'ui.the_account_has_been_activated';
        $this->alert(
            'success',
            __($msg),
            [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]
        );

        $this->emitSelf('$refresh');
    }

    public function change_gender($gender)
    {
        $this->employee->user->gender = $gender == 1 ? 2 : 1;
        $this->employee->user->save();
    }


    public function getPieChartModelProperty()
    {
        $tasks = [
            [
                'type' => __('ui.tasks'),
                'value' => $this->todo_tasks
            ],
            [
                'type' => __('ui.in_progress'),
                'value' => $this->in_progress_tasks
            ],
            [
                'type' => __('ui.completed_tasks'),
                'value' => $this->done_tasks
            ],
        ];

        $pieChartModel = new LivewireCharts();

        $pieChartModel = collect($tasks)
            ->reduce(
                function ($pieChartModel, $data) {
                    $type = $data['type'];
                    $value = $data['value'];

                    return $pieChartModel->addSlice($type, $value, '#aaa');
                },
                LivewireCharts::pieChartModel()
                    //->setTitle('Expenses by Type')
                    ->setAnimated(true)
                    ->setType('donut')
                    // ->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled(true)
                    ->setColors(['#92a3c5', '#ffc94b', '#00EE63', '#f66665'])
            );

        return $pieChartModel;
    }


    public function render()
    {
        return view('livewire.employee.profile.show');
    }
}
