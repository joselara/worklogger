<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Report/Index', [
            // 'reports' => $request->user()->reports()->latest()->paginate(10) // Pagination added
            'reports' => $request->user()->reports()->with('tasks')->withCount('tasks')->orderBy('invoice_date','desc')->get() // Pagination removed
        ]);
    }

    public function create()
    {
        return Inertia::render('Report/Form');
    }

    public function store(Request $request)
    {
        // (Add validation for report fields here)

        $request->user()->reports()->create($request->all()); // Assuming fields are mass-assignable for now

        return Inertia::location(route('reports.index'));
    }

    public function show(Report $report)
    {
        // Ensure authorization to view this report if needed

        return Inertia::render('Report/Show', [
            'report' => $report->load('tasks') // Eager load related tasks
        ]);
    }

    public function update(Request $request, Report $report)
    {
        // (Add validation for report fields here)
        // Ensure authorization to edit this report if needed

        $report->update($request->all());

        return Inertia::location(route('reports.index'));
    }

    // ... Add a destroy method if you want deletion ...
}
