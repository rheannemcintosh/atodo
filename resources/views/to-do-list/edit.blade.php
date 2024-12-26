<h1>Edit To Do List</h1>
<form action="{{ route('to-do-list.update', $toDoList->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="date" name="date" value="{{ $toDoList->date }}">
    <div>
        <label for="is_working-day">Is Working Day?</label>
        <input type="checkbox" name="is_working_day" value="1" @if($toDoList->is_working_day) checked @endif>
    </div>
    <button type="submit">Update</button>
</form>
