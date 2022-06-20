<?php

namespace App\Http\Livewire\Task;

use App\Models\Task as TaskModel;
use Livewire\Component;

class Main extends Component
{

    protected $listeners = ['updatedSelectedTab'];
    public function updatedSelectedTab($value){ $this->selectedTab = $value; }

    public function mount(){
        $this->tabs = [__('ui.tasks'), __('ui.incomplete')];
        $this->selectedTab = 0;}

    public function render()
    {
        //get tasks from database
        return view('livewire.task.main');
    }
}
