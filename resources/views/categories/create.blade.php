<h1>Create Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <div>
            <label for="title">Category Title</label>
            <input type="text" name="title" placeholder="Category Title">
        </div>
        <div>
            <label for="description">Category Description</label>
            <textarea name="description" placeholder="Category Description"></textarea>
        </div>
        <div>
            <label for="is_active">Is Active?</label>
            <input type="checkbox" name="is_active" id="is_active" value="1" checked>
        </div>
    </div>
    <button type="submit">Save</button>
</form>

