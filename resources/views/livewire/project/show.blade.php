<div>
    title: {{$project->title}} <br>
    description: {{$project->description}} <br>

    Tasks : <br>
    @forelse ($project->tasks as $key => $task)
        {{$key + 1}} => title : {{$task->title}} <br>
        description: {{$task->description}} <br>
        importance: {{$task->importance}} <br>
        is_active: {{$task->is_active}} <br>
        state: {{$task->state}} <br>
        from => {{$task->start_at}}  to => {{$task->end_at}} <br>
    @empty
        no task
    @endforelse

    <br>

    files : <br>

    @forelse ($project->files as $file)
        <img src="{{$file->file_path}}" alt="" srcset="">
    @empty
        no files
    @endforelse

</div>
