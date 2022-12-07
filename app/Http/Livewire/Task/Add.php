<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\{WithFileUploads, WithPagination};
use App\Models\{Task, Project, Employee};
use App\Http\Controllers\Notifications;
use App\Traits\Livewire\NotificationTrait;
use Illuminate\Support\Facades\Auth;

class Add extends Component
{
    use  LivewireAlert, WithFileUploads, WithPagination, NotificationTrait;

    public $task, $taskd, $search, $employeesSearch, $employee_id, $project,  $taskEmployees = [], $files = [];

    protected $listeners = ['$refresh', 'duplicatTask'];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.start_at' => 'required',
        'task.user_name' => 'required',
    ];



    public function removeFile($index)
    {
        unset($this->files[$index]);
    }

    public function add()
    {
        $this->validate();
        $task = Task::create($this->task);

        $task->employees()->attach(array_keys($this->taskEmployees));

        if ($this->taskEmployees)
            $this->sendNotification($task->title, 'ui.add_task', array_keys($this->taskEmployees), $task->project->id);


        foreach ($this->taskEmployees as $employee) {
            if (!$task->project->employees()->wherePivot('employee_id', $employee['id'])->exists())
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
        $this->emitTo('notification.card', '$refresh');
        $this->emitTo('task.all', '$refresh');
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function addEmployee()
    {
        $employee = Employee::with('user:id,name')->findOrFail($this->employee_id);

        $array = [
            'id' => $employee->id,
            'name' => $employee->user->name,
        ];

        $this->taskEmployees[$array['id']] = $array;
    }

    public function removeEmployee($key)
    {
        unset($this->taskEmployees[$key]);
    }

    public function duplicatTask($task)
    {
        $this->reset();
        $this->task = $task;
        $this->search = $task['project']['title'];
    }

    public function mount()
    {
        $this->task['start_at'] = date('Y-m-d');
        $this->task['end_at'] = date('Y-m-d');
        $this->task['importance'] = 1;
        $this->task['user_name'] = Auth::user()->name;

        if ($this->project)
            $this->task['project_id'] = $this->project->id;
    }

    public function render()
    {
        $projects = [];
        $employees = [];
        $task_employees = [];

        if ($this->search) {
            $search = '%' . $this->search . '%';
            $projects = Project::where('title', 'LIKE', $search)->paginate(24);
        } else {
            $projects = Project::get();
        }


        if ($this->employeesSearch) {
            $search = '%' . $this->employeesSearch . '%';
            $employees = Employee::whereNotIn('id', collect($this->taskEmployees)->pluck('id')->toArray())->whereRelation('user', 'name', 'LIKE', $search)->paginate(10);
        } else {
            $employees = Employee::whereNotIn('id', collect($this->taskEmployees)->pluck('id')->toArray())->get();
        }
        $employee_auth = auth()->user()->employee;

        return view('livewire.task.add', [
            'projects' => $projects,
            'employee_auth' => $employee_auth,
            'employees' => $employees,
            'task_employees' => $task_employees,
        ]);
    }
}
