<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\Notification;

class All extends Component
{
    protected $listeners = ['$refresh'];
    public function render()
    {
        if (is_admin()) $notifications = Notification::orderByDesc('created_at')->get();
        else $notifications = is_employee()->notifications()->orderByDesc('created_at')->get();
        return view('livewire.notification.all', compact('notifications'));
    }
}
