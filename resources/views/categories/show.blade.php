
    <h1>{{ $category->title }}</h1>
    <p>{{ $category->description }}</p>
    <p>{{ $category->is_active }}</p>
    <a href="{{ route('categories.index') }}">Back to List</a>
