<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;



class Main extends Component
{
    use LivewireAlert;
    public $taskID;
    protected $listeners = ['updatedSelectedTab', 'toggleModal', 'deleteAll'];
    public function updatedSelectedTab($value)
    {
        $this->selectedTab = $value;
    }

    public function toggleModal($task_id)
    {
        $this->taskID = $task_id;
    }

    public function mount()
    {
        $this->tabs = [__('ui.tasks'), __('ui.archived')];
        $this->selectedTab = 0;
    }

    public function deleteAll()
    {
        DB::table('tasks')->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo('task.all', '$refresh');
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteAll',
        ]);
    }

    public function render()
    {
        return view('livewire.task.main');
    }
}
