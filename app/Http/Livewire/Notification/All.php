<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Notification;
class All extends Component
{
    protected $listeners = ['$refresh'];
    public function render()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('livewire.notification.all', compact('notifications'));
    }
}
