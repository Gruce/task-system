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
        'employee.state' => 'required',
        'employee.job' => 'required',
    ];

    public function mount()
    {
        $this->employee['user']['gender'] = 1;
    }



    public function save()
    {

        // $this->validate();
        $user = new User;
        $user->add($this->employee['user']);

        $employee = $user->employee()->create([
            'state' => $this->employee['state'] ?? 1,
            'job' => $this->employee['job'],
        ]);
        dg($employee->id);
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
