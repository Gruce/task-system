<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\{Employee , Notification};
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use  LivewireAlert;
    protected $listeners = ['search'];

    protected $rules = [
        'notification.title' => 'required',
        'notification.description' => 'required',
        'employee_id' => 'required',
    ];

    public $search ,$employee_id , $notification ,$employee_all;
    public $selectAll = false;
    public $select ;
    public $employeess = [];

    public function search($search){
        $this->search = $search;
    }

    public function add(){
        $this->validate();
        $notification = Notification::create($this->notification);
        $this->resetInput();
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
        $this->emitTo('notification.all', '$refresh');
    }


    public function addAllEmployee(){
        if ($this->selectAll) {
            $this->employeess = Employee::all()->pluck('id')->toArray();
        } else {
            $this->employeess = [];
        }
        //dd($this->employeess);
    }

    public function addEmployee(){
        if(!in_array($this->employee_id,$this->employeess)){
            $this->employeess[] = $this->employee_id;
        }else{
            $this->employeess = array_diff($this->employeess,[$this->employee_id]);
        }
        dd($this->employeess);
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
