<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class Card extends Component
{
    public $employee;
    public function render()
    {
        return view('livewire.employee.card');
    }
}
