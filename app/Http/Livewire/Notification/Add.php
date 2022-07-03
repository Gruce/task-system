<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Employee;

class Add extends Component
{
    protected $listeners = ['$refresh' , 'search'];
    public $search;
    public $selectAll = false;
    public $employeess = [];

    public function search($search){
        $this->search = $search;
    }
    // public function x()
    // {

    //     $this->selectAll = !$this->selectAll;

    //     if ($this->selectAll) {
    //         $this->employeess = Employee::all()->pluck('id')->toArray();
    //     } else {
    //         $this->employeess = [];
    //     }
    //     //dd($this->employeess);
    // }
    public function render()
    {
        $search = '%' . $this->search . '%';

        $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();

        return view(
            'livewire.notification.add',
            [
                'employees' => $employees,
            ]
        );
    }
}
