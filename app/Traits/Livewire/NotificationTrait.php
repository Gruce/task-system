<?php

namespace App\Traits\Livewire;

use App\Models\Notification;

trait NotificationTrait
{
    public function sendNotification($title, $description, $employee_ids, $project_id = null)
    {
        $data = [
            'title' => $title,
            'description' => $description,
            'read_at' => false,
            'project_id' => $project_id,
        ];

        $notification = Notification::create($data);
        $notification->employees()->attach($employee_ids);
    }
}
