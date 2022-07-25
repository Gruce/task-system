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
        if (is_admin()) $notifications = Notification::orderByDesc('created_at')->get();
        else $notifications = is_employee()->notifications()->orderByDesc('created_at')->get();
        return view('livewire.notification.all', compact('notifications'));
    }
}
