<h1>Create To Do List</h1>
<form action="{{ route('to-do-list.store') }}" method="POST">
    @csrf
    <input type="date" name="date">
    <button type="submit">Save</button>
</form>

