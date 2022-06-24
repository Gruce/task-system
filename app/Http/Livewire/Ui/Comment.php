<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Comment extends Component
{
    use WithPagination, LivewireAlert;

    public $commentable, $comment;

    public function comment()
    {
        $this->commentable->comment($this->comment);
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
        $comments = $this->commentable->comments();
        if ($this->commentable)
            $comments = $comments->where('commentable_id', $this->commentable->id);
        else
            $comments = $comments->whereNull('commentable_id');
        $comments = $comments->orderBy('id', 'desc')->paginate(10);
        return view('livewire.ui.comment', compact('comments'));
    }
}
