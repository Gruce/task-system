<?php

namespace App\Http\Livewire\Employee\Profile;

use App\Models\Employee;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
     public $state ;

    protected $rules = [
        'employee.user.name' => 'required',
        'employee.job' => 'required',
        'employee.user.phonenumber' => 'required',
        'employee.user.email' => 'required',

    ];

    public function state(Employee $employee)
    {
        $employee->state = !$employee->state;
        $employee->save();
        $msg = $employee->state ? 'ui.the_account_has_been_disabled' : 'ui.the_account_has_been_activated';
        $this->alert('success', __($msg),
        [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }


    public function mount($id)
    {
        $this->employee = Employee::with(['tasks', 'files'])
            ->withCount(['tasks', 'files'])
            ->findOrFail($id);
        // dd($this->employee->name);
    }
    public function edit_name(){
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
        return view('livewire.employee.profile.show');
    }
}
