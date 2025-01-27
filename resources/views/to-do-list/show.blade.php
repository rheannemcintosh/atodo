<x-app-layout>
    <form action="{{ route('to-do-list.update-tasks', $toDoList) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4 ">
            <div class="flex items-center p-2 w-full justify-between">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-semibold text-gray-800">
                        To Do List | {{ $toDoList->date }}
                    </h1>
                    <div class="bg-blue-700 rounded-md text-blue-100 text-sm px-4">
                        {{ $toDoList->completed ? 'Completed' : 'In Progress' }}
                    </div>
                </div>
                <button class="right-0 bg-gray-50 px-4 py-2 rounded-md text-gray-800 shadow-sm hover:bg-gray-100" type="submit">
                    Update Tasks
                </button>
            </div>
        </div>
        
        <div class=" rounded-lg">
            <table class="table-auto w-full text-left rounded-2xl">
                <thead class="bg-gray-100 text-gray-700 rounded-3xl">
                    <tr>
                        <th class="px-4 py-2 rounded-tl-lg border-b border-gray-200">#</th>
                        <th class="px-4 py-2 border-b border-gray-200">Task</th>
                        <th class="px-4 py-2 border-b border-gray-200">Category</th>
                        <th class="px-4 py-2 border-b border-gray-200">Frequency</th>
                        <th class="px-4 py-2 border-b border-gray-200">Status</th>
                        <th class="px-4 py-2 rounded-tr-lg border-b border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupedTasks as $group)
                        @foreach ($group['frequencies'] as $frequency)
                            <tr class="bg-gray-50">
                                <td colspan="6" class="font-bold text-gray-500 text-xs px-4 py-2 border-b border-gray-200">
                                    {{ $group['category_name'] }} | {{ $frequency['frequency'] }}
                                </td>
                            </tr>
                            @foreach ($frequency['tasks'] as $task)
                                <tr class="border-b border-gray-200">
                                    <td class="text-xs px-4 py-2">{{ $task->id }}</td>
                                    <td class="text-xs font-bold px-4 py-2">
                                            {{ $task->title }}
                                    </td>
                                    <td class="text-xs px-4 py-2">
                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700">
                                            {{ $task->category->title }}
                                        </span>
                                    </td>
                                    <td class="text-xs px-4 py-2">
                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700">
                                            {{ $task->preferred_frequency }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 ">
                                        <span class="
                                            px-2 py-1 text-xs rounded font-bold
                                            @if ($task->status === 'Completed') bg-green-700 text-green-100 @endif
                                            @if ($task->status === 'Cancelled') bg-red-700 text-red-100 @endif
                                            @if ($task->status === 'In Progress') bg-blue-700 text-blue-100 @endif
                                            @if ($task->status === 'To Do') bg-gray-100 text-gray-700 @endif
                                            @if ($task->status === 'Partially Completed') bg-purple-700 text-purple-100 @endif
                                        ">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <select name="tasks[{{ $task->task_status_id }}][status]" id="task-{{ $task->task_status_id }}" class="text-xs">
                                            <option value="">Select Status</option>
                                            <option class="" value="To Do" @if($task->status === 'To Do') selected @endif>To Do</option>
                                            <option value="In Progress" @if($task->status === 'In Progress') selected @endif>In Progress</option>
                                            <option value="Partially Completed" @if($task->status === 'Partially Completed') selected @endif>Partially Completed</option>
                                            <option value="Completed" @if($task->status === 'Completed') selected @endif>Completed</option>
                                            <option value="Cancelled" @if($task->status === 'Cancelled') selected @endif>Cancelled</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</x-app-layout>
