<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use App\Models\Project;



class Main extends Component
{

    public $taskID;
    protected $listeners = ['updatedSelectedTab', 'toggleModal'];
    public function updatedSelectedTab($value){ $this->selectedTab = $value; }

    public function toggleModal($task_id){
        $this->taskID = $task_id;
    }

    public function mount(){
        $this->tabs = [__('ui.tasks'), __('ui.archived')];
        $this->selectedTab = 0;}

    public function render(){
        return view('livewire.task.main');
    }
}
