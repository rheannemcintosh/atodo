<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\View;

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
}
