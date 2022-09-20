<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh', 'deleteCheckedProject'];
    public $selectAll = false;
    public $selected = [];

    public function mount()
    {
        $this->notifications = Notification::withTrashed()->orderByDesc('id')->get(['id', 'title']);
    }

    public function select()
    {
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $this->notifications->pluck('id')->toArray() : [];
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteCheckedProject',
        ]);
    }

    public function deleteCheckedProject()
    {
        Notification::whereIn('id', $this->selected)->forceDelete();

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        redirect()->route('notifications');
    }
    public function render()
    {
        return view('livewire.notification.delete');
    }
}
