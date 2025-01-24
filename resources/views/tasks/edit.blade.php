<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Create Task</h1>
    </div>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="task_detail_id">Task Detail</label>
            <select name="task_detail_id">
                <option value="">Select Task Detail</option>
                @foreach ($taskDetails as $taskDetail)
                    <option value="{{ $taskDetail->id }}" @if($task->task_detail_id == $taskDetail->id) selected @endif>{{ $taskDetail->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" placeholder="Due Date" value="{{ $task->due_date }}">
        </div>
        <div>
            <label for="started_at">Started At</label>
            <input type="date" name="started_at" value="{{ $task->started_at }}">
        </div>
        <div>
            <label for="completed_at">Completed At</label>
            <input type="date" name="completed_at" value="{{ $task->completed_at }}">
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status">
                <option value="To Do" @if('To Do' == $task->status) selected @endif>To Do</option>
                <option value="In Progress" @if('In Progress' == $task->status) selected @endif>In Progress</option>
                <option value="Partially Completed" @if('Partially Completed' == $task->status) selected @endif>Partially Completed</option>
                <option value="Completed" @if('Completed' == $task->status) selected @endif>Completed</option>
                <option value="Cancelled" @if('Cancelled' == $task->status) selected @endif>Cancelled</option>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</x-app-layout>
