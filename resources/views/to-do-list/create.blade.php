<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Create To Do List</h1>
    </div>

    <div>
        @if ($errors)
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
    </div>

    <div>
        <form action="{{ route('to-do-list.store') }}" method="POST">
            @csrf
            <div>
                <h2 class="text-lg font-bold">All To Do Lists</h2>
                <div class="p-2">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date">
                </div>
                <div class="p-2">
                    <label for="type">To Do List Type</label>
                    <select name="type">
                        <option value="Daily">Daily</option>
                        <option value="Weekly">Weekly</option>
                    </select>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-bold">Daily To Do Lists</h2>
                <div class="p-2">
                    <label for="is_home_day">Is Home Day?</label>
                    <input type="checkbox" name="is_home_day" value="1">
                </div>
                <div class="p-2">
                    <label for="is_working-day">Is Working Day?</label>
                    <input type="checkbox" name="is_working_day" value="1">
                </div>
                <div class="p-2">
                    <label for="is_outside_day">Is Outside Day?</label>
                    <input type="checkbox" name="is_outside_day" value="1">
                </div>
                <div class="p-2">
                    <label for="is_makeup_day">Is Makeup Day?</label>
                    <input type="checkbox" name="is_makeup_day" value="1">
                </div>
            </div>
            <div>
                <h2 class="text-lg font-bold">Weekly To Do Lists</h2>
                <div class="p-2">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date">
                </div>
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</x-app-layout>
