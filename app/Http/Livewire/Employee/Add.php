<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Add extends Component
{
    use LivewireAlert;
    public $employee;

    protected $rules = [
        'employee.user.name' => 'required',
        'employee.user.email' => 'required',
        'employee.user.password' => 'required',
        'employee.gender' => 'required',
        'employee.state' => 'required',
        'employee.job' => 'required',
    ];

    public function save()
    {
        $this->validate();
        Employee::create($this->employee);

        $this->emitTo('employee.main', '$refresh');
    }

    public function render()
    {
        return view('livewire.employee.add');
    }
}
