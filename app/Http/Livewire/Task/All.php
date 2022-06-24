<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;

class All extends Component
{
    public $search;

    protected $listeners = ['$refresh', 'search'];

    public function search($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $tasks  = Task::withCount('files')
            ->where('title', 'like', $search)
            ->orderByDesc('id')
            ->get();

        return view('livewire.task.all', compact('tasks'));
    }
}
