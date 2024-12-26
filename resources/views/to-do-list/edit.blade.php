<h1>Edit To Do List</h1>
<form action="{{ route('to-do-list.update', $toDoList->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="date" name="date" value="{{ $toDoList->date }}">
    <button type="submit">Update</button>
</form>
