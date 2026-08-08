<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'obtained_at' => 'nullable|date',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'description', 'obtained_at');

        if ($request->hasFile('certificate')) {
            $data['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }

        Skill::create($data);

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Skill::findOrFail($id)->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}