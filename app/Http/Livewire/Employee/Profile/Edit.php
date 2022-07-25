<?php

namespace App\Http\Livewire\Employee\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use LivewireAlert;

    protected $listeners = ['$refresh'];

    public $password, $password_confirmation;


    public function mount($employee)
    {
        $this->employee = $employee;
        $this->user = $employee->user;
        $this->name = $employee->user->name;
        $this->email = $employee->user->email;
        $this->username = $employee->user->username;
        $this->phonenumber = $employee->user->phonenumber;
        $this->gender = $employee->user->gender;
        $this->job = $employee->job;
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'username' => 'required',
        'gender' => 'required',

    ];


    public function edit()
    {
        $this->validate();

        if ($this->email != $this->employee->user->email && User::where('email', $this->email)->exists())
            return $this->alert('error', __('ui.email_already_exists'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);

        if ($this->username != $this->employee->user->username && User::where('username', $this->username)->exists())
            return $this->alert('error', __('ui.username_already_exists'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);

        $this->employee->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'phonenumber' => $this->phonenumber,
            'gender' => $this->gender,
        ]);

        $this->employee->update([
            'job' => $this->job,
        ]);

        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitTo('employee.profile.show', '$refresh');

        if ($this->password && $this->password_confirmation) {
            $this->validate(
                [
                    'password' => 'min:6',
                    'password_confirmation' => 'min:6|same:password',
                ],

            );
            $this->employee->user->update([
                'password' => bcrypt($this->password),
            ]);
            Auth::logout();
            redirect()->route('login');
        }
    }







    public function render()
    {
        return view('livewire.employee.profile.edit');
    }
}
