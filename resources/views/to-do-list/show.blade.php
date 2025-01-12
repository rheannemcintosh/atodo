<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold text-gray-800">To Do Lists</h1>
</div>
<div>
    <div>{{ $toDoList->id }}</div>
    <div>{{ $toDoList->date }}</div>
    <div>{{ $toDoList->completed }}</div>
    <div>{{ $toDoList->created_at }}</div>
    <div>{{ $toDoList->updated_at }}</div>

    @foreach ($groupedTasks as $group)
        <h3 class="font-bold text-3xl">{{ $group['category_name'] }}</h3>
        @foreach ($group['frequencies'] as $frequency)
            <h4 class="font-bold">{{ $frequency['frequency'] }}</h4>
            <ul>
                @forelse ($frequency['tasks'] as $task)
                    <li>{{ $task->title }} | {{ $task->status }}</li>
                @empty
                    <li>No tasks found in this category.</li>
                @endforelse
            </ul>
        @endforeach
    @endforeach
</div>
