<h1>Edit Category</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <div>
            <label for="title">Category Title</label>
            <input type="text" name="title" placeholder="Category Title" value="{{ $category->title }}">
        </div>
        <div>
            <label for="description">Category Description</label>
            <textarea name="description" placeholder="Category Description" value="{{ $category->description }}"></textarea>
        </div>
        <div>
            <label for="is_active">Is Active?</label>
            <input type="checkbox" name="is_active" id="is_active" value="true" @if ($category->is_active) checked @endif>
        </div>
    </div>
    <button type="submit">Update</button>
</form>
