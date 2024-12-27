<h1>Create To Do List</h1>
<form action="{{ route('to-do-list.store') }}" method="POST">
    @csrf
    <input type="date" name="date">
    <div>
        <label for="is_working-day">Is Working Day?</label>
        <input type="checkbox" name="is_working_day" value="1">
    </div>
    <div>
        <label for="is_outside_day">Is Outside Day?</label>
        <input type="checkbox" name="is_outside_day" value="1">
    </div>
    <div>
        <label for="is_makeup_day">Is Makeup Day?</label>
        <input type="checkbox" name="is_makeup_day" value="1">
    </div>
    <button type="submit">Save</button>
</form>

