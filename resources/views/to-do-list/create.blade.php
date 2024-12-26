<h1>Create To Do List</h1>
<form action="{{ route('to-do-list.store') }}" method="POST">
    @csrf
    <input type="date" name="date">
    <div>
        <label for="is_working-day">Is Working Day?</label>
        <input type="checkbox" name="is_working_day" value="1">
    </div>
    <button type="submit">Save</button>
</form>

