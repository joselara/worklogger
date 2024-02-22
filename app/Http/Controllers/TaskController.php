<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Task/Index', [
            'tasks' => $request->user()->tasks()->take(10)->get()
        ]);
    }
}
