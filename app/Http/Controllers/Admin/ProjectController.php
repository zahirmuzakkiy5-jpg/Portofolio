<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project; 
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'link'        => 'nullable|url',
        ]);

        Project::create($request->only('title', 'description', 'link'));

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.projects.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'link'        => 'nullable|url',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->only('title', 'description', 'link'));

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}