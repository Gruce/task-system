<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class All extends Component
{
    protected $listeners = ['$refresh', 'search'];
    public $search;

    public function search($search)
    {
        $this->search = $search;
    }
    public function render()
    {
        $search = '%' . $this->search . '%';
        $employees = Employee::withCount(['tasks', 'files', 'projects'])
            ->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            })
            ->orderByDesc('id')
            ->get();
        return view('livewire.employee.all', compact('employees'));
    }
}
