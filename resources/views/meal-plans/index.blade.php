<x-app-layout>
    <div class="mb-4 ">
        <div class="flex items-center p-2 w-full justify-between">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-semibold text-gray-800">
                    Meal Plans
                </h1>
            </div>
            <a href="{{ route('meal-plans.create') }}" class="right-0 bg-gray-50 px-4 py-2 rounded-md text-gray-800 shadow-sm hover:bg-gray-100" type="submit">
                Create Meal Plan
            </a>
        </div>
    </div>

    <div class="rounded-lg">
        <table class="table-auto w-full text-left rounded-2xl">
            <thead class="bg-gray-100 text-gray-700 rounded-3xl">
                <tr>
                    <th class="px-4 py-2 rounded-tl-lg border-b border-gray-200">#</th>
                    <th class="px-4 py-2 border-b border-gray-200">Date</th>
                    <th class="px-4 py-2 border-b border-gray-200">Breakfast</th>
                    <th class="px-4 py-2 border-b border-gray-200">Lunch</th>
                    <th class="px-4 py-2 border-b border-gray-200">Dinner</th>
                    <th class="px-4 py-2 border-b border-gray-200 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mealPlans as $mealPlan)
                <tr class="border-b border-gray-200">
                    <td class="text-xs px-4 py-2">{{ $mealPlan->id }}</td>
                    <td class="text-xs px-4 py-2">{{ $mealPlan->date }}</td>
                    <td class="text-xs px-4 py-2">{{ $mealPlan->breakfast }} </td>
                    <td class="text-xs px-4 py-2">{{ $mealPlan->lunch }} </td>
                    <td class="text-xs px-4 py-2">{{ $mealPlan->dinner }} </td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex justify-center items-center p-2 space-x-2 text-xs ">
                            <a
                                href="{{ route('meal-plans.show', $mealPlan->id) }}"
                                class="hover:underline"
                            >
                                    <span class="text-sm material-symbols-outlined">
                                        visibility
                                    </span>
                            </a>
                            <a
                                href="{{ route('meal-plans.edit', $mealPlan) }}"
                                class="hover:underline"
                            >
                                    <span class="text-sm material-symbols-outlined">
                                        edit_square

                                    </span>
                            </a>
                            <form
                                action="{{ route('meal-plans.destroy', $mealPlan->id) }}"
                                method="POST"
                                class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="">
                                        <span class="text-sm material-symbols-outlined">
                                            delete
                                        </span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
