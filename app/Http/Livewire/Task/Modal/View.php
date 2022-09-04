<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\DeleteTrait;

class View extends Component
{
    use LivewireAlert, DeleteTrait;

    protected $listeners = ['$refresh', 'delete', 'forceDelete'];

    protected $rules = [
        'task.start_at' => 'required',
        'task.end_at' => 'required',
    ];

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->tabs = [
            [__('ui.overview'), 'overview', 'fa-solid fa-home'],
            [__('ui.files'), 'files', 'fa-solid fa-paperclip'],
            [__('ui.comments'), 'comments', 'fa-solid fa-comments'],
            [__('ui.users'), 'users', 'fa-solid fa-users'],
        ];
    }

    public function state($state)
    {
        $this->task->state = $state;
        $this->task->change_at = date('Y-m-d');
        $this->task->save();

        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitSelf('$refresh');
        $this->emitTo('task.all', '$refresh');
    }

    public function importance($importance)
    {
        $this->task->importance = $importance;
        $this->task->save();

        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitSelf('$refresh');
        $this->emitTo('task.all', '$refresh');
    }

    public function is_hold($is_hold)
    {
        $this->task->is_hold = $is_hold;
        $this->task->save();

        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitSelf('$refresh');
        $this->emitTo('task.all', '$refresh');
    }

    public function edit()
    {
        if ($this->task->start_at < $this->task->end_at) {
            $this->alert('warning', __('ui.start_data_more_than_end_data'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);

            return;
        }
        $this->task->save();
        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo('task.all', '$refresh');
    }

    public function archive()
    {
        $this->confirmedDelete(new Task, $this->task->id, 'delete', ['task.all', 'task.archived', 'task.modal.view']);
    }

    public function confirmed($id)
    {
        $this->confirmedDelete(new Task, $id, 'forceDelete', ['task.all']);
    }

    public function render()
    {
        return view('livewire.task.modal.view');
    }
}
