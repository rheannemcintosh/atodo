<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TaskDetail;
use App\Models\ToDoList;
use App\PreferredFrequency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class TaskDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskDetails = TaskDetail::all();

        return View::make('task-detail.index', compact('taskDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $categories = Category::select('id', 'title')->get();
        $toDoLists = ToDoList::select('id', 'slug')->get();

        return View::make('task-detail.create', compact('categories', 'toDoLists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'preferred_frequency' => ['required', Rule::enum(PreferredFrequency::class)],
            'is_active' => 'boolean',
        ]);

        $taskDetail = TaskDetail::create($request->all());

        $request->validate([
            'to_do_list_id' => 'exists:to_do_lists,id'
        ]);

        $toDoList = ToDoList::find($request->to_do_list_id);

        $toDoList->tasks()->create([
            'user_id' => auth()->id(),
            'task_detail_id' => $taskDetail->id,
            'status' => 'To Do',
        ]);

        return redirect()->route('task-details.index')->with('success', 'Task Detail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taskDetail = TaskDetail::with('category')->findOrFail($id);

        return View::make('task-detail.show', compact('taskDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskDetail $taskDetail): \Illuminate\Contracts\View\View
    {
        $categories = Category::select('id', 'title')->get();

        return View::make('task-detail.edit', compact('taskDetail', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskDetail $taskDetail): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'preferred_frequency' => ['required', Rule::enum(PreferredFrequency::class)],
            'is_active' => 'boolean',
        ]);

        $taskDetail->update($request->all());

        return redirect()->route('task-details.index')->with('success', 'Task Detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskDetail $taskDetail)
    {
        $taskDetail->delete();

        return redirect()->route('task-details.index')->with('success', 'Task Detail deleted successfully.');
    }
}
