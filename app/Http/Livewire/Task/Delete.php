<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh', 'deleteCheckedTask'];
    public $selectAll = false;
    public $selected = [];

    public function mount()
    {
        $this->tasks = Task::withTrashed()->orderByDesc('id')->get();
    }

    public function select()
    {
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $this->tasks->pluck('id')->toArray() : [];
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteCheckedTask',
        ]);
    }

    public function deleteCheckedTask()
    {
        Task::whereIn('id', $this->selected)->forceDelete();

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        redirect()->route('tasks');
    }


    public function render()
    {
        return view('livewire.task.delete');
    }
}
