<?php

namespace App\Http\Livewire\Employee;

use App\Models\Department;
use Livewire\Component;
use App\Models\Employee;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class Add extends Component
{
    use LivewireAlert, WithFileUploads;
    public $user, $department_id,  $files = [];

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'user.username' => 'required|string|regex:/\w*$/|max:255|unique:users,username',
        'user.password' => 'required|min:6',
        'user.gender' => 'required',
        'user.phonenumber' => 'required',
        'user.profile_photo_path' => '',
        'user.employee.state' => '',
        'user.employee.job' => 'required',
    ];

    public function mount()
    {
        $this->departments = Department::get();
        $this->user['gender'] = 1;
        $this->user['profile_photo_path'] = null;
    }



    public function save()
    {
        $this->validate();
        $this->user['password'] = bcrypt($this->user['password']);

        $user = User::create($this->user);

        if ($this->user['profile_photo_path'])
            $user->add_file('profile_photo_path', $this->user['profile_photo_path'], 'users/' . $user->id . '/profile_photo/');

        $employee = $user->employee()->create([
            'department_id' => $this->department_id,
            'state' => $this->user['employee']['state'] ?? 1,
            'job' => $this->user['employee']['job'],
        ]);

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $employee->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'employees/' . $employee->id . '/files/' . $new_file->id);
            }




        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        redirect()->route('employees');
    }

    public function removeFile($index)
    {
        unset($this->files[$index]);
    }

    public function render()
    {
        return view('livewire.employee.add');
    }
}
