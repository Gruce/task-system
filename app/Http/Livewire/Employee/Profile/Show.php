<?php

namespace App\Http\Livewire\Employee\Profile;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;

class Show extends Component
{
    use LivewireAlert, WithFileUploads;
    public $state, $photo, $tasks, $taskID, $todo_tasks, $in_progress_tasks, $done_tasks;

    protected $listeners = ['$refresh', 'toggleModal'];

    public function toggleModal($task_id)
    {
        $this->taskID = $task_id;
    }

    protected $rules = [
        'employee.user.name' => 'required',
        'employee.user.username' => 'required|unique:users,username',
        'employee.user.password' => 'min:6',
        'password_confirmation' => 'min:6|same:employee.user.password',
        'employee.job' => 'required',
        'employee.user.gender' => 'required',
        'employee.user.phonenumber' => 'required',
        'employee.user.email' => 'required|email|unique:users,email',
    ];

    public function mount($id)
    {
        $this->employee = Employee::with(['tasks', 'files', 'user'])
            ->withCount(['tasks', 'files', 'projects'])
            ->findOrFail($id);
        // $this->employee->user->password = null;
        $this->tasks = $this->employee->tasks()->get();

        $this->todo_tasks = $this->tasks->where('state', 1)->count();
        $this->in_progress_tasks = $this->tasks->where('state', 2)->count();
        $this->done_tasks = $this->tasks->where('state', 3)->count();

        //
        $this->projects = $this->employee->projects()->get();
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


    // public function calctimeprogress()
    // {
    //     $this->task = Task::get()->last();
    //     $task=$this->task;
    //     $start_at = $task->start_at;

    //        $s = strtotime($start_at) ;
    //        $end_at = $task->end_at;
    //        $e = strtotime($end_at);
    //        $t1 = strtotime($end_at)- strtotime(now());
    //        $t2 = strtotime($end_at)- strtotime($start_at);
    //        $res = 100 - ($t1/$t2)*100;

    //     return (int)$res;
    //     }

    public function edit()
    {

        $this->employee->user->update([
            'name' => $this->employee['user']['name'],
            'username' => $this->employee['user']['username'],
            'email' => $this->employee['user']['email'],
            'phonenumber' => $this->employee['user']['phonenumber'],
            // 'password' => $this->employee->user->password,
        ]);

        // $this->employee->job = $this->employee['job'];
        // $this->employee->save();

        $this->employee->update([
            'job' => $this->employee['job'],
        ]);


        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
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
