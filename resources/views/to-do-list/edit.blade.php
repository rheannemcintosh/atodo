<h1>Edit To Do List</h1>
<form action="{{ route('to-do-list.update', $toDoList->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="date" name="date" value="{{ $toDoList->date }}">
    <div>
        <label for="is_working-day">Is Working Day?</label>
        <input type="checkbox" name="is_working_day" value="1" @if($toDoList->is_working_day) checked @endif>
    </div>
    <div>
        <label for="is_outside_day">Is Outside Day?</label>
        <input type="checkbox" name="is_outside_day" value="1" @if($toDoList->is_outside_day) checked @endif>
    </div>
    <div>
        <label for="is_makeup_day">Is Makeup Day?</label>
        <input type="checkbox" name="is_makeup_day" value="1" @if($toDoList->is_makeup_day) checked @endif>
    </div>
    <button type="submit">Update</button>
</form>
