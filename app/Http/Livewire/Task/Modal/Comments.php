<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\NotificationTrait;

class Comments extends Component
{
    use LivewireAlert, NotificationTrait;
    public $task, $comment;

    protected $rules = [
        'comment' => 'required',
    ];

    public function add_comment()
    {
        $this->validate();
        $this->task->comment($this->comment);
        $this->comment = '';

        $this->sendNotification(
            $this->task->title,
            'ui.add_comment',
            is_admin() ? auth()->user()->id : auth()->user()->employee->id,
        );

        $this->emitTo('notification.card', '$refresh');
    }

    public function render()
    {
        $comments = $this->task->comments();
        if ($this->task)
            $comments = $comments->where('commentable_id', $this->task->id);
        else
            $comments = $comments->whereNull('commentable_id');
        $comments = $comments->orderByDesc('id')->paginate(10);
        return view('livewire.task.modal.comments', compact('comments'));
    }
}
