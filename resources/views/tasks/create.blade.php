<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Create Tasks</h1>
    </div>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="task_detail_id">Task Detail</label>
            <select name="task_detail_id">
                <option value="">Select Task Detail</option>
                @foreach ($taskDetails as $taskDetail)
                    <option value="{{ $taskDetail->id }}">{{ $taskDetail->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" placeholder="Due Date">
        </div>
        <div>
            <label for="started_at">Started At</label>
            <input type="date" name="started_at">
        </div>
        <div>
            <label for="completed_at">Completed At</label>
            <input type="date" name="completed_at">
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status">
                <option value="To Do">To Do</option>
                <option value="In Progress">In Progress</option>
                <option value="Partially Completed">Partially Completed</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</x-app-layout>
