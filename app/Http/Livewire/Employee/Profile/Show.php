<?php

namespace App\Http\Livewire\Employee\Profile;

use App\Models\Employee;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class Show extends Component
{
    use LivewireAlert;
    public $state;

    protected $rules = [
        'employee.user.name' => 'required',
        'employee.job' => 'required',
        'employee.user.gender' => 'required',
        'employee.user.phonenumber' => 'required',
        'employee.user.email' => 'required',

    ];

    public function state(Employee $employee)
    {
        $employee->state = !$employee->state;
        $employee->save();
        $msg = $employee->state ? 'ui.the_account_has_been_disabled' : 'ui.the_account_has_been_activated';
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
    }

    public function change_gender(User $user)
    {
        $user->gender == 1 ? $user->gender = 2 : $user->gender = 1;
        $user->save();
    }
    public function mount($id)
    {
        $this->employee = Employee::with(['tasks', 'files'])
            ->withCount(['tasks', 'files'])
            ->findOrFail($id);
        //  dd($this->employee);
        // dd($res);
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

    public function edit_name()
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
        // $this->progress = $this->calctimeprogress();
        return view('livewire.employee.profile.show');
    }
}
