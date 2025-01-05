<h1>Edit To Do List</h1>
<form action="{{ route('task-details.update', $taskDetail->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" value="{{ $taskDetail->title }}">
    </div>
    <div>
        <label for="category_id">Category</label>
        <select name="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $taskDetail->category_id) selected @endif>{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description">{{ $taskDetail->description }}</textarea>
    </div>
    <div>
        <label for="preferred_frequency">Preferred Frequency</label>
        <select name="preferred_frequency">
            <option value="">Select Preferred Frequency</option>
            <option value="Daily" @if('Daily' == $taskDetail->preferred_frequency) selected @endif>Daily</option>
            <option value="Weekly" @if('Weekly' == $taskDetail->preferred_frequency) selected @endif>Weekly</option>
            <option value="Bi-Weekly" @if('Bi-Weekly' == $taskDetail->preferred_frequency) selected @endif>Bi-Weekly</option>
            <option value="Monthly" @if('Monthly' == $taskDetail->preferred_frequency) selected @endif>Monthly</option>
            <option value="Quarterly" @if('Quarterly' == $taskDetail->preferred_frequency) selected @endif>Quarterly</option>
            <option value="Biannually" @if('Biannually' == $taskDetail->preferred_frequency) selected @endif>Biannually</option>
            <option value="Yearly" @if('Yearly' == $taskDetail->preferred_frequency) selected @endif>Yearly</option>
            <option value="Intermittent" @if('Intermittent' == $taskDetail->preferred_frequency) selected @endif>Intermittent</option>
            <option value="Unique" @if('Unique' == $taskDetail->preferred_frequency) selected @endif>Unique</option>
        </select>
    </div>
    <div>
        <label for="is_active">Is Active?</label>
        <input type="checkbox" name="is_active" id="is_active" value="1"  @if ($taskDetail->is_active) checked @endif>
    </div>
    <button type="submit">Save</button>
</form>
