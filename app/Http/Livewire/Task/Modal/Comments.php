<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Comments extends Component
{
    use LivewireAlert;
    public $task, $comment;

    protected $rules = [
        'comment' => 'required',
    ];

    public function add_comment()
    {
        $this->validate();
        $this->task->comment($this->comment);
        $this->comment = '';

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
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
