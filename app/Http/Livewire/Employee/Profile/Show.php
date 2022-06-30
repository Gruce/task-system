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

class Show extends Component
{
    use LivewireAlert, WithFileUploads;
    public $state, $photo;

    protected $listeners = ['$refresh'];

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

        // $columnChartModel = LivewireCharts::radarChartModel()->addSeries(
        //     'series1'
        //     [
        //         'name' => 'series1',
        //         'data' => [
        //             ['x' => 'A', 'y' => 10],
        //             ['x' => 'B', 'y' => 20],
        //             ['x' => 'C', 'y' => 30],
        //             ['x' => 'D', 'y' => 40],
        //             ['x' => 'E', 'y' => 50],
        //         ],
        //     ]
        // );

        // $this->progress = $this->calctimeprogress();
        return view('livewire.employee.profile.show',);
    }
}
