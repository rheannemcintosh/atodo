<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">{{ $taskDetail->title }}</h1>
    </div>
    <p>Category ID: {{ $taskDetail->category->title }}</p>
    <p>Description: {{ $taskDetail->description }}</p>
    <p>Preferred Frequency: {{ $taskDetail->preferred_frequency }}</p>
    <p>Is Active: {{ $taskDetail->is_active ? 'True' : 'False'}}</p>

    <a href="{{ route('task-details.index') }}">Back to List</a>
</x-app-layout>
