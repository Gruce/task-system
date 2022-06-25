<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\{WithFileUploads , WithPagination};
use App\Models\{Task , Project , Employee};

class Add extends Component
{
    use  LivewireAlert, WithFileUploads , WithPagination;

    public $task , $search , $userId , $employee_id, $limitPerPage = 10 , $files = [];

    protected $listeners = ['$refresh' , 'delete' ,'load-more' => 'loadMore'];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.importance' => 'required',
        'task.start_at' => 'required',
        'task.end_at' => 'required',
        'task.description' => 'required',
    ];

    public function mount(){
        $this->task['start_at'] = date('Y-m-d');
        $this->task['end_at'] = date('Y-m-d');
    }

    public function removeFile($index){
        unset($this->files[$index]);
    }

    public function add(){
        $this->validate();
        $task = Task::create($this->task);

        if($this->task->employees()->wherePivot('employee_id' , $this->userId)->exists()){
            $this->alert('error', __('ui.data_already_exists'), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'width' => '400',
            ]);
            return;
        }

        $this->task->employees()->attach($this->userId);

        if(!$this->task->project->employees()->wherePivot('employee_id' , $this->userId)->exists())
            $this->task->project->employees()->attach($this->userId);

        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $task->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'tasks/' . $task->id . '/files/' . $new_file->id);
            }
            $this->emitTo( 'task.all' ,'$refresh');
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);


    }

    public function confirmed($id, $function){
        $this->employee_id = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => $function,
        ]);
    }

    public function delete(){
        $this->task->employees()
                        ->wherePivot('employee_id' , $this->employee_id)
                        ->detach();

        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }
    public function loadMore(){
        $this->limitPerPage = $this->limitPerPage + 10;
    }

    public function render()
    {
        $projects = [];
        if($this->search){
            $search = '%' . $this->search . '%';
            $projects = Project::where('title' , 'LIKE' , $search)->paginate(24);
        }

        $task_employees = [] ;
        $employees = [];
        if($this->search){
            $search = '%' . $this->search . '%';
            $employees = Employee::whereRelation('user' , 'name' , 'LIKE' , $search)->paginate(10);
            $task_employees = $this->task->employees()->paginate($this->limitPerPage);
    }
        return view('livewire.task.add' , [
            'projects' => $projects,
            'employees' => $employees,
            'task_employees' => $task_employees,
        ]);
    }
}
