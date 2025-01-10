<h1>{{ $task->id }}</h1>
<p>Task Detail: {{ $task->task_detail_id }} | {{ $task->taskDetail->title  }}</p>
<p>Due Date: {{ $task->due_date }}</p>
<p>Started At: {{ $task->started_at }}</p>
<p>Completed At: {{ $task->completed_at }}</p>
<p>Status: {{ $task->status }}</p>
<p>To Do List IDs: {{ $task->to_do_list_ids }}</p>

<a href="{{ route('tasks.index') }}">Back to List</a>
