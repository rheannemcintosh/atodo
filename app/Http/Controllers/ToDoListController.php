<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\ToDoList;
use App\Rules\EndDateRequired;
use App\Services\TaskAssignmentService;
use App\ToDoListType;
use Carbon\Carbon;
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
            'type' => ['required', Rule::enum(ToDoListType::class)],
            'start_date' => 'required|date',
            'end_date' => [new EndDateRequired()],
            'is_working_day' => 'nullable|boolean',
            'is_outside_day' => 'nullable|boolean',
            'is_makeup_day' => 'nullable|boolean',
            'is_home_day' => 'nullable|boolean',
        ]);

        // Generate slug based on the type
        $slug = $this->generateSlug($request->type, $request->start_date, $request->end_date);

        $toDoList = ToDoList::create([
            'type' => $request->type,
            'slug' => $slug,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date ?? null,
            'is_working_day' => (bool) $request->is_working_day,
            'is_outside_day' => (bool) $request->is_outside_day,
            'is_makeup_day' => (bool) $request->is_makeup_day,
            'is_home_day' => (bool) $request->is_home_day,
        ]);

        app(TaskAssignmentService::class)->assignTasks($toDoList);

        return redirect()->route('to-do-list.index')->with('success', 'To Do List created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($type, $slug)
    {
        $toDoList = ToDoList::where('slug', $slug)->first();

        if (! $toDoList) {
            abort(404, 'To-do list not found for the given date.');
        }

        // Get all task statuses
        $tasks = $toDoList->tasks;

        // Extract tasks from task statuses
        $taskDetails = $tasks->pluck('taskDetail')->filter(); // Ensures we only include non-null tasks

        $joinedCollection = $taskDetails->map(function ($task) use ($tasks) {
            $task['status'] = $tasks->firstWhere('task_detail_id', $task['id'])['status'] ?? null; // Get status or null
            $task['task_status_id'] = $tasks->firstWhere('task_detail_id', $task['id'])['id'] ?? null;

            $task['short_description'] = $tasks->firstWhere('task_detail_id', $task['id'])['short_description'] ?? null;
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
                    'frequency' => $frequency,
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
            'type' => ['required', Rule::enum(ToDoListType::class)],
            'start_date' => 'required|date',
            'end_date' => [new EndDateRequired()],
            'is_working_day' => 'nullable|boolean',
            'is_outside_day' => 'nullable|boolean',
            'is_makeup_day' => 'nullable|boolean',
            'is_home_day' => 'nullable|boolean',
        ]);

        // Generate slug based on the type
        $slug = $this->generateSlug($request->type, $request->start_date, $request->end_date);

        $toDoList->update([
            'type' => $request->type,
            'slug' => $slug,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date ?? null,
            'is_working_day' => (bool) $request->is_working_day,
            'is_outside_day' => (bool) $request->is_outside_day,
            'is_makeup_day' => (bool) $request->is_makeup_day,
            'is_home_day' => (bool) $request->is_home_day,
        ]);

        return redirect()->route('to-do-list.index')->with('success', 'To Do List updated successfully.');
    }

    /**
     * Update all tasks attached to a to do list.
     */
    public function updateTasks(Request $request, ToDoList $toDoList): \Illuminate\Http\RedirectResponse
    {
        $tasks = $request->input('tasks', []);
        foreach ($tasks as $id => $data) {

            $task = Task::findOrFail($id);
            $task->status = $data['status'] ?? $task->status; // Use existing status if not provided
            $task->save();
        }

        return redirect()->back()->with('success', 'All task statuses updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDoList $toDoList): \Illuminate\Http\RedirectResponse
    {
        $toDoList->delete();

        return redirect()->route('to-do-list.index')->with('success', 'To Do List deleted successfully.');
    }

    private function generateSlug(string $type, string $startDate, ?string $endDate = null): string
    {
        $carbonDate = \Carbon\Carbon::parse($startDate)->locale('en_US');

        switch ($type) {
            case 'Daily':
                return $carbonDate->format('Y-m-d'); // 2024-01-31

            case 'Weekly':
                return $carbonDate->isoFormat('Y-\Www'); // 2025-W52

            default:
                throw new \InvalidArgumentException("Invalid to-do list type.");
        }
    }
}
