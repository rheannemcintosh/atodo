<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TaskDetail;
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

        return View::make('task-detail.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'               => 'required|string|max:255',
            'category_id'         => 'required|exists:categories,id',
            'description'         => 'nullable|string',
            'preferred_frequency' => Rule::enum(PreferredFrequency::class),
            'is_active'           => 'boolean',
        ]);

        TaskDetail::create($request->all());

        return redirect()->route('task-details.index')->with('success', 'Task Detail created successfully.');
    }
}
