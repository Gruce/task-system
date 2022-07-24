<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Notification;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\DeleteTrait;


class All extends Component
{
    use LivewireAlert;
    use DeleteTrait;
    protected $listeners = [ '$refresh' , 'delete'];

    public function confirmed($id)
    {
        $this->confirmedDelete(new Notification, $id, 'delete', ['notification.all' , 'notification.card'] );
    }

    public function render()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('livewire.notification.all', compact('notifications'));
    }
}
