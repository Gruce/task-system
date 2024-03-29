<table>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <thead>
        <tr>
            <th>
                #
            </th>
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
        @foreach ($projects as $index => $project )
        <tr>
            <th>
                {{$loop->index + 1}}
            </th>
            <td>
                {{$project->title}}
            </td>
            <td>
                {{$project->description}}
            </td>
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
        @endforeach
    </tbody>
</table>