<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{

    use  LivewireAlert;
    protected $listeners = ['$refresh', '$play'];

    public function read($id)
    {
        $employee = auth()->user()->employee;
        $notification = $employee->notifications()->where('notification_id', $id)->first();

        if ($notification) {
            $notification->pivot->read = true;
            $notification->pivot->save();

            $this->emitSelf('$refresh');
        } else $this->alert('error', __('ui.no_tasks'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
    public function render()
    {
        if (!auth()->user()->is_admin) {
            $notifications = is_employee()->notifications->where('pivot.read', false);
        } else {
            $notifications = Notification::orderByDesc('id')->get();
        }
        return view('livewire.notification.card', [
            'notifications' => $notifications,
        ]);
    }
}
