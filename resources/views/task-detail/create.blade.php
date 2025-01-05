<h1>Create To Do List</h1>
<form action="{{ route('task-details.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <label for="category_id">Category</label>
        <select name="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description"></textarea>
    </div>
    <div>
        <label for="preferred_frequency">Preferred Frequency</label>
        <select name="preferred_frequency">
            <option value="">Select Preferred Frequency</option>
            <option value="Daily">Daily</option>
            <option value="Weekly">Weekly</option>
            <option value="Bi-Weekly">Bi-Weekly</option>
            <option value="Monthly">Monthly</option>
            <option value="Quarterly">Quarterly</option>
            <option value="Biannually">Biannually</option>
            <option value="Yearly">Yearly</option>
            <option value="Intermittent">Intermittent</option>
            <option value="Unique">Unique</option>
        </select>
    </div>
    <div>
        <label for="is_active">Is Active?</label>
        <input type="checkbox" name="is_active" id="is_active" value="1" checked>
    </div>
    <button type="submit">Save</button>
</form>
