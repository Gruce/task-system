<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['$refresh'];

    

    public $task, $userId, $modal = false, $tabs;

    public function mount($task){
        $this->task = $task;
    }




    public function render(){

        return view('livewire.task.card');
    }
}
