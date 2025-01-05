<h1>Task Details</h1>
<a href="{{ route('task-details.create') }}">Create New Task Detail</a>
<ul>
    @foreach ($taskDetails as $taskDetail)
        <li>
            {{ $taskDetail->title }}
            <a href="{{ route('task-details.show', $taskDetail->id) }}">Show</a>
            <a href="{{ route('task-details.edit', $taskDetail->id) }}">Edit</a>
            <form action="{{ route('task-details.destroy', $taskDetail->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
