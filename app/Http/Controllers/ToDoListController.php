<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ToDoList;
use App\Services\TaskAssignmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $toDoLists = ToDoList::all();
        return View::make('to-do-list.index', compact('toDoLists'));
    }

    /**
     * Show the form for creating a new to do list.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return View::make('to-do-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'date'           => 'required|date|unique:to_do_lists',
            'is_working_day' => 'boolean',
            'is_outside_day' => 'boolean',
            'is_makeup_day'  => 'boolean',
        ]);

        $toDoList = ToDoList::create([
            'date'           => $request->date,
            'is_working_day' => (bool)$request->is_working_day,
            'is_outside_day' => (bool)$request->is_outside_day,
            'is_makeup_day'  => (bool)$request->is_makeup_day,
        ]);

        app(TaskAssignmentService::class)->assignTasks($toDoList);

        return redirect()->route('to-do-list.index')->with('success', 'To Do List created successfully.');
    }

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

        // Get all task statuses
        $tasks = $toDoList->tasks;

        // Extract tasks from task statuses
        $taskDetails = $tasks->pluck('taskDetail')->filter(); // Ensures we only include non-null tasks

        $joinedCollection = $taskDetails->map(function ($task) use ($tasks) {
            $task['status'] = $tasks->firstWhere('task_detail_id', $task['id'])['status'] ?? null; // Get status or null
            $task['task_status_id'] = $tasks->firstWhere('task_detail_id', $task['id'])['id'] ?? null;
            return $task;
        });

        // Group tasks by category_id
        $tasksByCategory = $joinedCollection->groupBy('category_id');

        // Prepare data for the view
        $groupedTasks = [];
        foreach ($tasksByCategory as $categoryId => $tasks) {
            $category = Category::find($categoryId);

            // Further group tasks by frequency
            $tasksByFrequency = $tasks->groupBy('preferred_frequency');

            $groupedFrequencies = [];
            foreach ($tasksByFrequency as $frequency => $tasksInFrequency) {
                $groupedFrequencies[] = [
                    'frequency' => $frequency ?? 'No Frequency', // Default if no frequency is set
                    'tasks' => $tasksInFrequency,
                ];
            }

            $groupedTasks[] = [
                'category_name' => $category ? $category->title : 'Uncategorized',
                'frequencies' => $groupedFrequencies,
            ];
        }

        return view('to-do-list.show', compact('toDoList', 'groupedTasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDoList $toDoList): \Illuminate\Contracts\View\View
    {
        return View::make('to-do-list.edit', compact('toDoList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDoList $toDoList): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'date' => [
                'required',
                'date',
                Rule::unique('to_do_lists')->ignore($toDoList->id),
            ],
            'is_working_day' => 'boolean',
            'is_outside_day' => 'boolean',
            'is_makeup_day'  => 'boolean',
        ]);

        $toDoList->update([
            'date'           => $request->date,
            'is_working_day' => (bool)$request->is_working_day,
            'is_outside_day' => (bool)$request->is_outside_day,
            'is_makeup_day'  => (bool)$request->is_makeup_day,
        ]);

        return redirect()->route('to-do-list.index')->with('success', 'To Do List updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDoList $toDoList): \Illuminate\Http\RedirectResponse
    {
        $toDoList->delete();

        return redirect()->route('to-do-list.index')->with('success', 'To Do List deleted successfully.');
    }
}
