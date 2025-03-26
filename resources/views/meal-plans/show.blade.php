<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">{{ $mealPlan->date }}</h1>
    </div>
    <div>
        <p>Breakfast: {{ $mealPlan->breakfast }}</p>
        <p>Morning Snack: {{ $mealPlan->morning_snack }}</p>
        <p>Lunch: {{ $mealPlan->lunch }}</p>
        <p>Afternoon Snack: {{ $mealPlan->afternoon_snack }}</p>
        <p>Dinner: {{ $mealPlan->dinner }}</p>
        <p>Nighttime Snack: {{ $mealPlan->nighttime_snack }}</p>
    </div>
    <a href="{{ route('meal-plans.index') }}">Back to List</a>

</x-app-layout>
