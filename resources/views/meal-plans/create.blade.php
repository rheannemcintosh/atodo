<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Create Meal Plan</h1>
    </div>
    <form action="{{ route('meal-plans.store') }}" method="POST" class="space-y-6 bg-white px-6 pb-6 rounded-lg border border-gray-200">
        @csrf

        <!-- Date -->
        <div class="flex flex-col">
            <label for="date" class="text-sm font-medium text-gray-700">Date</label>
            <input
                type="date"
                name="date"
                id="date"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <!-- Breakfast -->
        <div class="flex flex-col">
            <label for="breakfast" class="text-sm font-medium text-gray-700">Breakfast</label>
            <input
                type="text"
                name="breakfast"
                id="breakfast"
                placeholder="Enter Breakfast"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <!-- Morning Snack -->
        <div class="flex flex-col">
            <label for="morning_snack" class="text-sm font-medium text-gray-700">Morning Snack</label>
            <input
                type="text"
                name="morning_snack"
                id="morning_snack"
                placeholder="Enter Morning Snack"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <!-- Lunch -->
        <div class="flex flex-col">
            <label for="lunch" class="text-sm font-medium text-gray-700">Lunch</label>
            <input
                type="text"
                name="lunch"
                id="lunch"
                placeholder="Enter Lunch"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <!-- Afternoon Snack -->
        <div class="flex flex-col">
            <label for="afternoon_snack" class="text-sm font-medium text-gray-700">Afternoon Snack</label>
            <input
                type="text"
                name="afternoon_snack"
                id="afternoon_snack"
                placeholder="Enter Afternoon Snack"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <!-- Dinner -->
        <div class="flex flex-col">
            <label for="dinner" class="text-sm font-medium text-gray-700">Dinner</label>
            <input
                type="text"
                name="dinner"
                id="dinner"
                placeholder="Enter Dinner"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <!-- Nighttime Snack -->
        <div class="flex flex-col">
            <label for="nighttime_snack" class="text-sm font-medium text-gray-700">Nighttime Snack</label>
            <input
                type="text"
                name="nighttime_snack"
                id="nighttime_snack"
                placeholder="Enter Nighttime Snack"
                class="text-sm mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
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
