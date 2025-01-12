 <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold text-gray-800">To Do Lists</h1>
</div>
<div>
    <a href="{{ route('to-do-list.create') }}" class="bg-blue-500 text-white font-bold px-2 py-1 rounded-lg">Create New To Do List</a>
    <ul>
        @foreach ($toDoLists as $toDoList)
            <li>
                {{ $toDoList->date }}
                <a
                    href="{{ route(
                        'to-do-list.show',
                        [date('Y', strtotime($toDoList->date)),
                        date('m', strtotime($toDoList->date)),
                        date('d', strtotime($toDoList->date))]
                    )}}"
                    class="text-coral-500 hover:underline"
                >
                    Show
                </a>
                <a href="{{ route('to-do-list.edit', $toDoList->id) }}">Edit</a>
                <form action="{{ route('to-do-list.destroy', $toDoList->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
