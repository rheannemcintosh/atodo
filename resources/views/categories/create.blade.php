
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Category Title">
        <button type="submit">Save</button>
    </form>

