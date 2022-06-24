<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Employee;

class Users extends Component
{
    protected $listeners = ['$refresh', 'search'];

    public $task, $search;

    public function search($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $employees = Employee::whereRelation('user' , 'name' , 'LIKE' , $search)->get();
        return view('livewire.task.modal.users' ,['employees' => $employees]);
    }
}
