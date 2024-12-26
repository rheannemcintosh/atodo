<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ToDoList;

class ToDoListController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($year, $month, $day)
    {
        // Parse the date into a format matching the database
        $date = "$year-$month-$day";

        // Find the to-do list for the given date
        $toDoList = ToDoList::whereDate('date', $date)->first();

        if (!$toDoList) {
            abort(404, 'To-do list not found for the given date.');
        }

        // Get all task statuses with their related tasks
        $taskStatuses = $toDoList->taskStatus()->with('task')->get();

        // Extract tasks from task statuses
        $tasks = $taskStatuses->pluck('task')->filter(); // Ensures we only include non-null tasks

        // Group tasks by category_id
        $tasksByCategory = $tasks->groupBy('category_id');

        // Prepare data for the view
        $groupedTasks = [];
        foreach ($tasksByCategory as $categoryId => $tasks) {
            $category = Category::find($categoryId);

            $groupedTasks[] = [
                'category_name' => $category ? $category->name : 'Uncategorized',
                'tasks' => $tasks,
            ];
        }

        return view('to-do-list.show', compact('toDoList', 'groupedTasks'));
    }
}
