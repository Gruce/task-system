<?php

namespace App\Http\Livewire\Ui;

use App\Models\Department;
use Livewire\Component;

class FilterEmployee extends Component
{
    public $department_id = null;

    public function mount()
    {
        $this->departments = Department::get();
    }
    public function render()
    {
        $this->emit('filterEmployee', $this->department_id);
        return view('livewire.ui.filter-employee');
    }
}
