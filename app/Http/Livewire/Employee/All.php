<?php

namespace App\Http\Livewire\Employee;

use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;

class All extends Component
{
    protected $listeners = ['$refresh', 'search', 'filterEmployee'];
    public $search, $department_id;

    public function search($search)
    {
        $this->search = $search;
    }
    public function filterEmployee($department_id)
    {
        $this->department_id = $department_id;
    }


    public function render()
    {
        $search = '%' . $this->search . '%';
        $employees = Employee::withCount(['tasks', 'files', 'projects']);

        if ($search) {
            $employees = $employees->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            });
        }

        if ($this->department_id)  $employees->where('department_id', $this->department_id);

        $employees = $employees
            ->orderByDesc('id')
            ->paginate(24);
        return view('livewire.employee.all', compact('employees'));
    }
}
