<?php

namespace App\Http\Livewire\Project\Show;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Comments extends Component
{
    use WithPagination, LivewireAlert;

    public $project, $comment;

    protected $rules = [
        'comment' => 'required',
    ];

    public function add_comment()
    {
        $this->validate();
        $this->project->comment($this->comment);
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
        $comments = $this->project->comments();
        if ($this->project)
            $comments = $comments->where('commentable_id', $this->project->id);
        else
            $comments = $comments->whereNull('commentable_id');
        $comments = $comments->orderByDesc('id')->paginate(10);
        return view('livewire.project.show.comments', compact('comments'));
    }
}
