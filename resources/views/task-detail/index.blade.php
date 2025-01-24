<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Task Details</h1>
    </div>
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
</x-app-layout>
