<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index($search = null)
    {
        $projects = Project::latest();

        if ($search) {
            $projects->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            });
        }

        $projects = $projects->paginate(5);


        return view('admin.projects', compact('projects'));
    }

    // Delete a Project
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Менеджер удален!',
        ]);
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|regex:/^[\d-]+$/',
            'email' => 'required|email|unique:Projects,email',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create(array_merge($validated, [
            'image' => $imagePath,
        ]));

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Менеджер успешно создан!',
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|regex:/^[\d-]+$/',
            'email' => 'required|email|unique:Projects,email,' . $project->id,
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        $project->update(array_merge($validated, [
            'image' => $project->image,
        ]));

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Менеджер успешно обновлен!',
        ]);
    }
}
