<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class All extends Component
{
    public function render()
    {
        return view('livewire.employee.all', [
            'employees' => Employee::all()
        ]);
    }
}
