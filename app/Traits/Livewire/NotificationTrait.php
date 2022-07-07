<?php

namespace App\Traits\Livewire;

use App\Models\Notification;

trait NotificationTrait
{
    public function sendNotification($title, $description, $employee_ids)
    {
        $data = [
            'title' => $title,
            'description' => $description,
        ];

        $notification = Notification::create($data);
        $notification->employees()->attach($employee_ids);
    }
}
