<h1>Categories</h1>
<a href="{{ route('categories.create') }}">Create New Category</a>
<ul>
    @foreach ($categories as $category)
        <li>
            {{ $category->title }}
            <a href="{{ route('categories.show', $category->id) }}">Show</a>
            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
