<h1>To Do Lists</h1>
<a href="{{ route('to-do-list.create') }}">Create New To Do List</a>
<ul>
    @foreach ($toDoLists as $toDoList)
        <li>
            {{ $toDoList->date }}
            <a href="{{ route('to-do-list.edit', $toDoList->id) }}">Edit</a>
            <form action="{{ route('to-do-list.destroy', $toDoList->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
