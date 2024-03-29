<?php

namespace App\Http\Livewire\Project\Show;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\NotificationTrait;

class Comments extends Component
{
    use WithPagination, LivewireAlert, NotificationTrait;

    public $project, $comment;
    public $limitPerPage = 10;

    protected $rules = [
        'comment' => 'required',
    ];

    public function add_comment()
    {
        $this->validate();
        $this->project->comment($this->comment);
        $this->comment = '';

        $this->sendNotification(
            $this->project->title,
            'ui.add_comment',
            is_admin() ? auth()->user()->id : auth()->user()->employee->id,
            $this->project->id,
        );
        $this->emitTo('notification.card', '$refresh');
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 10;
    }

    public function render()
    {
        $comments = $this->project->comments();
        if ($this->project)
            $comments = $comments->with('user:id,name,is_admin')->where('commentable_id', $this->project->id);
        else
            $comments = $comments->whereNull('commentable_id');

        $comments = $comments->orderByDesc('id')->paginate($this->limitPerPage);
        return view('livewire.project.show.comments', ['comments' => $comments]);
    }
}
