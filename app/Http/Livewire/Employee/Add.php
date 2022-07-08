<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;



class Add extends Component
{
    use LivewireAlert, WithFileUploads;
    public $user, $files = [];

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users',
        'user.username' => 'required|unique:users',
        'user.password' => 'required',
        'user.gender' => 'required',
        'user.phonenumber' => 'required',
        'user.profile_photo_path' => '',
        'user.employee.state' => 'required',
        'user.employee.job' => 'required',
    ];

    public function mount()
    {
        $this->user['gender'] = 1;
        $this->user['profile_photo_path'] = null;
    }



    public function save()
    {
        dg($this->user);
        $this->validate();
        $this->user['password'] = bcrypt($this->user['password']);

        $user = User::create($this->user);

        if ($this->user['profile_photo_path'])
            $user->add_file('profile_photo_path', $this->user['profile_photo_path'], 'users/' . $user->id . '/profile_photo/');

        $user = $user->employee()->create([
            'state' => $this->user['employee']['state'] ?? 1,
            'job' => $this->user['employee']['job'],
        ]);

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $user->employee->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'employees/' . $user->employee->id . '/files/' . $new_file->id);
            }


        $this->emitTo('employee.main', '$refresh');

        $this->reset();

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function render()
    {
        return view('livewire.employee.add');
    }
}
