<h1>{{ $taskDetail->title }}</h1>
<p>Category ID: {{ $taskDetail->category->title }}</p>
<p>Description: {{ $taskDetail->description }}</p>
<p>Preferred Frequency: {{ $taskDetail->preferred_frequency }}</p>
<p>Is Active: {{ $taskDetail->is_active ? 'True' : 'False'}}</p>

<a href="{{ route('task-details.index') }}">Back to List</a>
