<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Edit To Do List</h1>
    </div>

    <div>
        @if ($errors)
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
    </div>

    <form action="{{ route('to-do-list.update', $toDoList->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div>
                <h2 class="text-lg font-bold">All To Do Lists</h2>
                <div class="p-2">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" value="{{ $toDoList->start_date }}">
                </div>
                <div class="p-2">
                    <label for="type">To Do List Type</label>
                    <select name="type">
                        <option value="" disabled>Please Select...</option>
                        <option value="Daily" @if($toDoList->type == 'daily') selected @endif>Daily</option>
                        <option value="Weekly" @if($toDoList->type == 'weekly') selected @endif>Weekly</option>
                    </select>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-bold">Daily To Do Lists</h2>
                <div class="p-2">
                    <label for="is_home_day">Is Home Day?</label>
                    <input type="checkbox" name="is_home_day" value="1" @if($toDoList->is_home_day) checked @endif>
                </div>
                <div class="p-2">
                    <label for="is_working-day">Is Working Day?</label>
                    <input type="checkbox" name="is_working_day" value="1" @if($toDoList->is_home_day) checked @endif>
                </div>
                <div class="p-2">
                    <label for="is_outside_day">Is Outside Day?</label>
                    <input type="checkbox" name="is_outside_day" value="1" @if($toDoList->is_home_day) checked @endif>
                </div>
                <div class="p-2">
                    <label for="is_makeup_day">Is Makeup Day?</label>
                    <input type="checkbox" name="is_makeup_day" value="1" @if($toDoList->is_home_day) checked @endif>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-bold">Weekly To Do Lists</h2>
                <div class="p-2">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" value="{{ $toDoList->end_date }}">
                </div>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</x-app-layout>
