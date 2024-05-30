<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(StoreTechnologyRequest $request)
    {
        $validated=$request->validated();
        $slug= Str::slug($validated['name'], '-');
        $validated['slug'] = $slug;
        Technology::create($validated);

        return redirect()->route('admin.technologies.index')->with('success', 'Technology created successfully.');
    }

    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $validated = $request->validated();
        $slug = Str::slug($validated['name'], '-');
        $validated['slug'] = $slug;
        $technology->update($validated);
        
        Technology::create($validated);

        return redirect()->route('admin.technologies.index')->with('success', 'Technology create successfully.');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully.');
    }
}