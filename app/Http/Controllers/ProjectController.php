<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
    $projects = Project::all();

    return view('projects.index', compact('projects'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('projects.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'due_date' => 'required|date',
        'status' => 'required|string'
    ]);

    Project::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'status' => $request->status
    ]);

    return redirect()->route('projects.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $project = Project::findOrFail($id);

    return view('projects.show', compact('project'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $project = Project::findOrFail($id);

    return view('projects.edit', compact('project'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'due_date' => 'required|date',
        'status' => 'required|string'
    ]);

    $project = Project::findOrFail($id);

    $project->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'status' => $request->status
    ]);

    return redirect()->route('projects.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $project = Project::findOrFail($id);

    $project->delete();

    return redirect()->route('projects.index');
}
}
