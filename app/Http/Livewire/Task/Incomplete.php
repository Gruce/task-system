<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task as TaskModel;
class Incomplete extends Component
{
    public $search ;

    protected $listeners = ['$refresh' , 'search'];

    public function search($search){
        $this->search = $search;
    }

    public function render(){
        $search = '%' . $this->search . '%';
        $tasks = TaskModel::where('title' , 'LIKE' , $search)
                ->orderByDesc('id')
                ->get();;
        return view('livewire.task.incomplete', compact('tasks'));
    }
}
