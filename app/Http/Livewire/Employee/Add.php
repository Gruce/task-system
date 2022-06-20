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
        'employee.name' => 'required',
    ];

    public function save()
    {
        $this->validate();
        Employee::create($this->employee);

        $this->emitTo('employee.index', '$refresh');
    }

    public function render()
    {
        return view('livewire.employee.add');
    }
}
