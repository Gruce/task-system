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
        'notification.description' => '',
    ];

    public $search, $employee_id, $notification, $employees;

    public $selectAll = false;
    public $selected = [];

    public function search($search)
    {
        $this->search = $search;
    }

    public function add()
    {
        $this->validate();

        if (!$this->selected) {
            $this->alert('error', __('ui.no_tasks'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
            ]);

            return;
        }

        $notification = Notification::create($this->notification);

        $notification->employees()->attach($this->selected);

        $this->reset();
        $this->emitTo('notification.card', '$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function updatingSelectAll($value)
    {
        if ($value) {
            $this->selected = $this->employees->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }



    public function render()
    {
        $search = '%' . $this->search . '%';
        $this->employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();

        return view('livewire.notification.add');
    }
}
