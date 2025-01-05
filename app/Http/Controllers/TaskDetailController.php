<?php

namespace App\Http\Controllers;

use App\Models\TaskDetail;
use Illuminate\Support\Facades\View;

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
}
