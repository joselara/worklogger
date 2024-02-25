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
        return Inertia::render('Task/Form');
    }

    public function store(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'completed_at' => 'nullable|date',
            'completed' => 'boolean'
        ])->validateWithBag('createTask');

        $request->user()->tasks()->save(
            Task::make($validData)
        );

        return Inertia::location(route('tasks.index'));;
    }

    public function show(Task $task)
    {
        return Inertia::render('Task/Form', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validData = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'completed_at' => 'nullable|date',
            'completed' => 'boolean'
        ])->validateWithBag('updateTask');

        $task->update($validData);

        return Inertia::location(route('tasks.index'));
    }
}
