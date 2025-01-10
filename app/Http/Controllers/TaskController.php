<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use App\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return View::make('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $taskDetails = TaskDetail::select('id', 'title')->get();

        return View::make('tasks.create', compact('taskDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_detail_id' => 'required|exists:task_details,id',
            'due_date'       => 'nullable|date',
            'started_at'     => 'nullable|date',
            'completed_at'   => 'nullable|date',
            'status'         => ['required', Rule::enum(TaskStatus::class)],
            'to_do_list_ids' => 'nullable|array',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('taskDetail')->findOrFail($id);

        return View::make('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): \Illuminate\Contracts\View\View
    {
        $taskDetails = TaskDetail::select('id', 'title')->get();

        return View::make('tasks.edit', compact('task', 'taskDetails'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'task_detail_id' => 'required|exists:task_details,id',
            'due_date'       => 'nullable|date',
            'started_at'     => 'nullable|date',
            'completed_at'   => 'nullable|date',
            'status'         => ['required', Rule::enum(TaskStatus::class)],
            'to_do_list_ids' => 'nullable|array',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
