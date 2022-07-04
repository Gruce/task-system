<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use  LivewireAlert;
    protected $listeners = [ 'search'];

    protected $rules = [
        'employee_id' => 'required',
    ];

    public $search ,$employee_id ,$select;
    public $selectAll = false;

    //public $employeess = [];

    public function search($search){
        $this->search = $search;
    }

    public function add(){
        $this->validate();
        $this->employee_id = $this->selected;
        $this->emitTo('notification.all', '$refresh');
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }


    //remove employee
    public function remove($id){
        $this->emitTo('notification.all', '$refresh');
        $this->alert('success', __('ui.data_has_been_removed_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
    
    public function addAllEmployee()
    {
        $this->selectAll = !$this->selectAll;
        if ($this->selectAll) {
            $this->employeess = Employee::all()->pluck('id')->toArray();
        } else {
            $this->employeess = [];
        }
        //dd($this->employeess);
    }
    public function render(){
        $search = '%' . $this->search . '%';
        $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();

        if($this->employee_id){
            $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();
        }

        return view('livewire.notification.add',[
                'employees' => $employees,
            ]);
    }
}
