<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{

    use  LivewireAlert;
    protected $listeners = ['$refresh'];

    public function read($id)
    {
        if (!is_admin()) {
            $employee = auth()->user()->employee;
            $notification = $employee->notifications()->where('notification_id', $id)->first();
            if ($notification) {
                $notification->pivot->read = true;
                $notification->pivot->save();
                $this->emitSelf('$refresh');
            }
        } else {
            $notification = Notification::find($id);
            if ($notification) {
                $notification->read_at = true;
                $notification->save();
                $this->emitSelf('$refresh');
            }
        }
    }
    public function render()
    {
        if (!auth()->user()->is_admin) {
            $notifications = is_employee()->notifications->where('pivot.read', false);
        } else {
            $notifications = Notification::where('read_at', false)->orderByDesc('id')->get();
        }
        return view('livewire.notification.card', [
            'notifications' => $notifications,
        ]);
    }
}
