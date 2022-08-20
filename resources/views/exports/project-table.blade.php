<table>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <thead>
        <tr>
            <th>
                {{__('ui.project_title')}}
            </th>
            <th>
                {{__('ui.project_description')}}
            </th>
            <th>
                {{__('ui.project_progress')}}
            </th>
            <th>
                {{__('ui.total_tasks')}}
            </th>
            <th>
                {{__('ui.completed_tasks')}}
            </th>
            <th>
                {{__('ui.uncompleted_tasks')}}
            </th>
            <th>
                {{__('ui.create_at')}}
            </th>
            <th>
                {{__('ui.create_at')}}
            </th>
            <th>
                {{__('ui.completed_at')}}
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                {{$project->title}}
            </th>
            <th>
                {{$project->description}}
            </th>
            <td>
                {{$project->description}}
            </td>
            <td>
                {{$project->percentage_completed_tasks . '%'}}
            </td>
            <td>
                {{$project->tasks->count()}}
            </td>
            <td>
                {{$project->completed_tasks}}
            </td>
            <td>
                {{$project->un_completed_tasks}}
            </td>
            <td>
                {{date('Y-m-d', strtotime($project->created_at))}}
            </td>
            <td>
                {{$project->done ? date('Y-m-d', strtotime($project->change_at)) : ''}}
            </td>
        </tr>
    </tbody>
</table>

//Task Table

<table>
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                {{__('ui.task_name')}}
            </th>
            <th>
                {{__('ui.task_description')}}
            </th>
            <th>
                {{__('ui.task_state')}}
            </th>
            <th>
                {{__('ui.task_importance')}}
            </th>
            <th>
                {{__('ui.start_at')}}
            </th>
            <th>
                {{__('ui.end_at')}}
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $index => $task )
        <tr>
            <th>
                {{$loop->index + 1}}
            </th>
            <th>
                {{$task->title}}
            </th>
            <th>
                {{$task->description}}
            </th>
            <td>
                @if ($task->state == 1)
                {{__('ui.to_do')}}
                @elseif ($task->state == 2)
                {{__('ui.in_progress')}}
                @else
                {{__('ui.done')}}

                @endif
            </td>
            <td>
                @switch($task->importance)
                @case(1)
                {{__('ui.importance_low')}}
                @break
                @case(2)
                {{__('ui.importance_medium')}}
                @break
                @case(3)
                {{__('ui.importance_high')}}
                @break
                @default
                {{__('ui.no_data')}}
                @endswitch
            </td>
            <td>
                {{$task->start_at}}
            </td>
            <td>
                {{$task->end_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

//Employee Table

<table>
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                {{__('ui.name')}}
            </th>
            <th>
                {{__('ui.task_count')}}
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $index => $employee )
        <tr>
            <th>
                {{$loop->index + 1}}
            </th>
            <th>
                {{$employee->name}}
            </th>
            <th>
                {{$employee->tasks_count}}
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
