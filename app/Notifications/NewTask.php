<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewTask extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;

    protected $task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $arr = ['database', 'broadcast'];

        if ($notifiable->receive_email == 2) {
            $arr[] = 'mail';
        }

        return $arr;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->task->id,
            'title'              => $this->task->title,
            'created_at'        => $this->task->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => [
                'id'            => $this->task->id,
                'title'          => $this->task->title,
                'created_at'    => $this->task->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
