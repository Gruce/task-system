<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\{WithFileUploads, WithPagination};
use App\Models\{Task, Project, Employee};
use App\Notifications\NewTask;

class Add extends Component
{
    use  LivewireAlert, WithFileUploads, WithPagination;

    public $task , $taskd, $search,$employeesSearch ,$employee_id, $taskEmployees = [] , $files = [];

    protected $listeners = ['$refresh' , 'duplicatTask'];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.importance' => 'required',
        'task.start_at' => 'required',
        'task.end_at' => 'required',
        'task.description' => 'required',
    ];



    public function removeFile($index){
        unset($this->files[$index]);
    }

    public function add(){
        $this->validate();
        $task = Task::create($this->task);

        // auth()->user()->notify(new NewTask($task));

        $task->employees()->attach(array_keys($this->taskEmployees));

        foreach($this->taskEmployees as $employee){
            if(!$task->project->employees()->wherePivot('employee_id' , $employee['id'])->exists())
                $task->project->employees()->attach($employee['id']);

        }

        if (count($this->files) > 0)
            foreach ($this->files as $file) {
                $new_file = $task->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'tasks/' . $task->id . '/files/' . $new_file->id);
            }

        $this->reset();
        $this->emitTo('task.all', '$refresh');
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function addEmployee(){
        $employee = Employee::with('user:id,name')->findOrFail($this->employee_id);

        $array = [
            'id' => $employee->id,
            'name' => $employee->user->name,
        ];

        $this->taskEmployees[$array['id']] = $array;
    }

    public function removeEmployee($key){
        unset($this->taskEmployees[$key]);
    }

    public function duplicatTask($task){
        $this->reset();
        $this->task = $task;
        $this->search = $task['project']['title'];

        $this->taskEmployees = collect($task['employees'])
                                ->map(fn($item) => ['id' => $item['id'] , 'name' => $item['user']['name']])
                                ->toArray();

    }

    public function mount(){
        $this->task['start_at'] = date('Y-m-d');
        $this->task['end_at'] = date('Y-m-d');
        $this->task['importance'] = 1;
    }

    public function render()
    {
        $projects = [];
        $employees = [];
        $task_employees = [];

        if ($this->search) {
            $search = '%' . $this->search . '%';
            $projects = Project::where('title', 'LIKE', $search)->paginate(24);
        }

        if ($this->employeesSearch) {
            $search = '%' . $this->employeesSearch . '%';
            $employees = Employee::whereNotIn('id' , collect($this->taskEmployees)->pluck('id')->toArray())->whereRelation('user', 'name', 'LIKE', $search)->paginate(10);
        }

        return view('livewire.task.add', [
            'projects' => $projects,
            'employees' => $employees,
            'task_employees' => $task_employees,
        ]);
    }
}
