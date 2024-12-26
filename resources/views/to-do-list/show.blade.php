<div>{{ $toDoList->id }}</div>
<div>{{ $toDoList->date }}</div>
<div>{{ $toDoList->completed }}</div>
<div>{{ $toDoList->created_at }}</div>
<div>{{ $toDoList->updated_at }}</div>

@foreach ($groupedTasks as $group)
    <h3>{{ $group['category_name'] }}</h3>
    <ul>
        @forelse ($group['tasks'] as $task)
            <li>{{ $task->title }} | {{ $task->status }}</li>
        @empty
            <li>No tasks found in this category.</li>
        @endforelse
    </ul>
@endforeach
