<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\{Employee};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\NotificationTrait;

class Add extends Component
{
    use  LivewireAlert, NotificationTrait;
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
            $this->alert('error', __('ui.no_employee_selected'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        $this->sendNotification(
            $this->notification['title'],
            $this->notification['description'],
            $this->selected
        );

        $this->reset();
        $this->emitTo('notification.card', '$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function select()
    {
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $this->employees->pluck('id')->toArray() : [];
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $this->employees = Employee::whereRelation('user', 'name', 'LIKE', $search)->get();

        return view('livewire.notification.add');
    }
}
