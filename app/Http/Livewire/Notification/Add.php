<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\{Employee, Notification, User};
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

    public $search, $employee_id, $notification;

    public $selectAll = false;
    public $selected = [];

    public function search($search)
    {
        $this->search = $search;
    }

    public function add()
    {
        dd($this->selected);
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
    public function updatingSelectAll($value)
    {

        if ($value) {
            $this->selected = User::pluck('id');
        } else {
            $this->selected = [];
        }
    }



    public function render()
    {
        $search = '%' . $this->search . '%';
        $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();

        if ($this->employee_id) {
            $employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();
        }

        return view('livewire.notification.add', [
            'employees' => $employees,
        ]);
    }
}
