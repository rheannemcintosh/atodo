<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">{{ $tag->id }} | {{ $tag->title }}</h1>
    </div>
    <div>
        <h1>{{ $tag->title }}</h1>
        <p>{{ $tag->description }}</p>
    </div>
    <a href="{{ route('tags.index') }}">Back to List</a>

</x-app-layout>
