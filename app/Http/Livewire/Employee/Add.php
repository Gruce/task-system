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
    public $employee, $files = [];

    protected $rules = [
        'employee.user.name' => 'required',
        'employee.user.email' => 'required',
        'employee.user.password' => 'required',
        'employee.user.gender' => 'required',
        'employee.user.phonenumber' => 'required',
        'employee.user.profile_photo_path' => 'image|max:1024',
        'employee.state' => 'required',
        'employee.job' => 'required',
    ];

    public function mount()
    {
        $this->employee['user']['gender'] = 1;
        $this->employee['user']['profile_photo_path'] = null;
    }



    public function save()
    {

        // $this->validate();
        $this->employee['user']['password'] = bcrypt($this->employee['user']['password']);
        $user = User::create($this->employee['user']);

        $user->add_file('profile_photo_path', $this->employee['user']['profile_photo_path'], 'users/' . $user->id . '/profile_photo/');

        $employee = $user->employee()->create([
            'state' => $this->employee['state'] ?? 1,
            'job' => $this->employee['job'],
        ]);

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $employee->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'employees/' . $employee->id . '/files/' . $new_file->id);
            }


        $this->emitTo('employee.main', '$refresh');

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
