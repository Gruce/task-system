<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Notification;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class All extends Component
{
    use LivewireAlert;
    public $ID;
    protected $listeners = [ '$refresh' , 'delete'];

    public function confirmed ($id, $function)
    {
        $this->ID = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => $function,
        ]);
    }
    public function delete ()
    {
        Notification::findOrFail($this->ID)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitSelf('$refresh');
        $this->emitTo('notification.card' , '$refresh');
    }

    public function render()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('livewire.notification.all', compact('notifications'));
    }
}
