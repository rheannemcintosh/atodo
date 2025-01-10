<h1>Tasks</h1>
<a href="{{ route('tasks.create') }}">Create New Task</a>
<ul>
    @foreach ($tasks as $task)
        <li>
            {{ $task->id }} | {{ $task->taskDetail->title }}  ({{ $task->due_date }})
            <a href="{{ route('tasks.show', $task->id) }}">Show</a>
            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
