<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Project;
use Livewire\WithPagination;



class Overview extends Component
{
    use LivewireAlert , WithPagination;

    protected $listeners = ['$refresh'];

    public $task , $search;

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.description' => 'required',
        'task.start_at' => 'required',
        'task.end_at' => 'required',
    ];

    public function edit(){
        if($this->task->start_at < $this->task->end_at){
            $this->alert('warning', __('ui.start_data_more_than_end_data'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);

            return ;
        }
        $this->task->save();
        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo( 'task.all' ,'$refresh');
    }

    public function render()
    {

        $projects = [];
        if($this->search){
            $search = '%' . $this->search . '%';
            $projects = Project::where('title' , 'LIKE' , $search)->paginate(24);
        }


        return view('livewire.task.modal.overview' , [
            'projects' => $projects,
        ]);
    }
}
