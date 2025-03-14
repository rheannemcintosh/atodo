<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Create Task Detail</h1>
    </div>
    <form action="{{ route('task-details.store') }}" method="POST" class="space-y-6 bg-white px-6 pb-6 rounded-lg border border-gray-200">
        @csrf
        <!-- Title -->
        <div class="flex flex-col">
            <label for="title" class="text-sm font-medium text-gray-700">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Enter Title"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required
            >
        </div>
        <!-- Category -->
        <div class="flex flex-col">
            <label for="category_id" class="text-sm font-medium text-gray-700">Category</label>
            <select
                name="category_id"
                id="category_id"
                class="text-sm mt-1 p-2 border  border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required
            >
                <option value="" disabled selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <!-- Description -->
        <div class="flex flex-col">
            <label for="description" class="text-sm font-medium text-gray-700">Description</label>
            <textarea
                name="description"
                id="description"
                placeholder="Enter Description"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                rows="3"
            ></textarea>
        </div>
        <!-- Preferred Frequency -->
        <div class="flex flex-col">
            <label for="preferred_frequency" class="text-sm font-medium text-gray-700">Preferred Frequency</label>
            <select
                name="preferred_frequency"
                id="preferred_frequency"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required
            >
                <option value="" disabled selected>Select Preferred Frequency</option>
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
        <!-- Is Active -->
        <div class="flex items-center">
            <input
                type="checkbox"
                name="is_active"
                id="is_active"
                value="1"
                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                checked
            >
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Is Active?</label>
        </div>

        <!-- To Do List -->
        <div class="flex flex-col">
            <label for="to_do_list_id" class="text-sm font-medium text-gray-700">To Do List</label>
            <select
                name="to_do_list_id"
                id="to_do_list_id"
                class="text-sm mt-1 p-2 border  border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required
            >
                <option value="" disabled selected>Select To Do List</option>
                @foreach ($toDoLists as $toDoList)
                    <option value="{{ $toDoList->id }}">{{ $toDoList->slug }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Save
            </button>
        </div>
    </form>
</x-app-layout>
