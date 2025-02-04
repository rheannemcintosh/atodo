<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">{{ $project->id }} | {{ $project->title }}</h1>
    </div>
    <div>
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p>{{ $project->due_date }}</p>
        <p>{{ $project->started_at }}</p>
        <p>{{ $project->completed_at }}</p>
    </div>
    <a href="{{ route('projects.index') }}">Back to List</a>

</x-app-layout>
