<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="bg-coral-500 text-white px-4 py-2 rounded hover:bg-coral-600 transition">Create New Task</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-2 text-gray-600">ID</th>
                <th class="text-left px-4 py-2 text-gray-600">Title</th>
                <th class="text-left px-4 py-2 text-gray-600">Due Date</th>
                <th class="px-4 py-2 text-gray-600">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700">{{ $task->id }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $task->taskDetail->title }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $task->due_date }}</td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-coral-500 hover:underline">Show</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-coral-500 hover:underline">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
