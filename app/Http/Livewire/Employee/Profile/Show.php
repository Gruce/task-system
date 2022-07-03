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
    public $state, $photo, $taskID;

    protected $listeners = ['$refresh', 'toggleModal'];

    public function toggleModal($task_id)
    {
        $this->taskID = $task_id;
    }

    protected $rules = [
        'employee.user.name' => 'required',
        'employee.user.username' => 'required',
        'employee.user.password' => 'min:6',
        'password_confirmation' => 'min:6|same:employee.user.password',
        'employee.job' => 'required',
        'employee.user.gender' => 'required',
        'employee.user.phonenumber' => 'required',
        'employee.user.email' => 'required',

    ];


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

    public function mount($id)
    {
        $this->employee = Employee::with(['tasks', 'files', 'user'])
            ->withCount(['tasks', 'files'])
            ->findOrFail($id);

        // $this->employee->user->password = null;
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

    public function updatePofile()
    {

        $this->employee->save();
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

        $tasks = $this->employee->tasks()->get();

        $todo_tasks = $tasks->where('state', 1)->count();
        $in_progress_tasks = $tasks->where('state', 2)->count();
        $done_tasks = $tasks->where('state', 3)->count();

        $tasks = [
            'todo_tasks' => [
                'type' => __('ui.tasks'),
                'value' => $todo_tasks
            ],
            'in_progress_tasks' => [
                'type' => __('ui.in_progress'),
                'value' => $in_progress_tasks
            ],
            'done_tasks' => [
                'type' => __('ui.completed_tasks'),
                'value' => $done_tasks
            ],
        ];

        // $radarChartModel = new RadarChartModel;

        // $radarChartModel->setAnimated(true);

        // $radarChartModel = $radarChartModel->addSeries(__('ui.tasks'), __('ui.tasks'), $todo_tasks);
        // $radarChartModel = $radarChartModel->addSeries(__('ui.in_progress'), __('ui.in_progress'), $in_progress_tasks);
        // $radarChartModel = $radarChartModel->addSeries(__('ui.completed_tasks'), __('ui.completed_tasks'), $done_tasks);


        $pieChartModel = new LivewireCharts();

        $pieChartModel = collect($tasks)
        ->reduce(function ($pieChartModel, $data) {
            $type = $data['type'];
            $value = $data['value'];

            return $pieChartModel->addSlice($type, $value, '#aaa');
        }, LivewireCharts::pieChartModel()
            //->setTitle('Expenses by Type')
            ->setAnimated(true)
            ->setType('donut')
            // ->withoutLegend()
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled(true)
            ->setColors(['#92a3c5', '#ffc94b', '#00EE63', '#f66665'])
        );

        // $this->progress = $this->calctimeprogress();
        return view('livewire.employee.profile.show', [
            // 'radarChartModel' => $radarChartModel
            'pieChartModel' => $pieChartModel
        ]);
    }
}
