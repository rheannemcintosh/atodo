<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">{{ $task->id }}</h1>
        <a href="{{ route('tasks.create') }}" class="bg-coral-500 text-white px-4 py-2 rounded hover:bg-coral-600 transition">Create New Task</a>
    </div>

    <p>Task Detail: {{ $task->task_detail_id }} | {{ $task->taskDetail->title  }}</p>
    <p>Due Date: {{ $task->due_date }}</p>
    <p>Started At: {{ $task->started_at }}</p>
    <p>Completed At: {{ $task->completed_at }}</p>
    <p>Status: {{ $task->status }}</p>
    <p>To Do List IDs: {{ $task->to_do_list_ids }}</p>

    <a href="{{ route('tasks.index') }}">Back to List</a>
</x-app-layout>
