<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Create Project</h1>
    </div>
    <form action="{{ route('projects.store') }}" method="POST" class="space-y-6 bg-white px-6 pb-6 rounded-lg border border-gray-200">
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
        <!-- Due Date -->
        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" placeholder="Due Date">
        </div>
        <!-- Started At -->
        <div>
            <label for="started_at">Started At</label>
            <input type="date" name="started_at" placeholder="Started At">
        </div>

        <!-- Completed At -->
        <div>
            <label for="completed_at">Completed At</label>
            <input type="date" name="completed_at" placeholder="Completed At">
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
