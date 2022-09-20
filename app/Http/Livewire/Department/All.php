<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;


class All extends Component
{
    use WithPagination;
    public $search;
    protected $listeners = ['$refresh', 'search'];

    public function search($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $departments = Department::withCount('employees')->where('name', 'LIKE', $search)->orderByDesc('id')->paginate(24);
        return view('livewire.department.all', compact('departments'));
    }
}
