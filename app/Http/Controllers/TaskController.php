<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Task/Index', [
            'tasks' => $request->user()->tasks()->take(10)->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Task/Create');
    }

    public function store(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'due_date' => 'required|date'
        ])->validateWithBag('createTask');

        $request->user()->tasks()->create($validData);

        return redirect()->route('task.index');
    }
}
