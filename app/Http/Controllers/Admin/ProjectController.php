<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');

        $projects = Project::query()->orderBy('priority', 'desc');

        if ($search) {
            $projects->where('title_en', 'like', "%{$search}%");
        }

        $projects = $projects->paginate(5);

        return view('admin.projects', compact('projects'));
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        if ($project->image_content) {
            foreach ($project->image_content as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Project deleted!',
        ]);
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'description_en' => 'required|string|max:1500',
            'description_fr' => 'required|string|max:1500',
            'description_ru' => 'required|string|max:1500',
            'image' => 'nullable|image|max:1024',
            'is_featured' => 'nullable|boolean',
            'priority' => 'nullable|integer|min:1',
            'image_content' => 'nullable|array',
            'image_content.*' => 'nullable|image|max:1024',
            'featured_image' => 'nullable|image|max:1024',
            'stack' => 'nullable|array',
            'stack.*' => 'nullable|string|max:255',
            'text_content_en' => 'nullable|array',
            'text_content_fr' => 'nullable|array',
            'text_content_ru' => 'nullable|array',
            'text_content_en.*' => 'nullable|string|max:1500',
            'text_content_fr.*' => 'nullable|string|max:1500',
            'text_content_ru.*' => 'nullable|string|max:1500',
            'image_alt_en' => 'nullable|string|max:255',
            'image_alt_fr' => 'nullable|string|max:255',
            'image_alt_ru' => 'nullable|string|max:255',
            'image_content_alt_en' => 'nullable|array',
            'image_content_alt_fr' => 'nullable|array',
            'image_content_alt_ru' => 'nullable|array',
            'website_link' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('projects', 'public');
        }

        $imageContentPaths = [];
        if ($request->hasFile('image_content')) {
            foreach ($request->file('image_content') as $image) {
                $imageContentPaths[] = $image->store('projects', 'public');
            }
        }

        Project::create(array_merge($validated, [
            'image' => $imagePath,
            'featured_image' => $featuredImagePath,
            'image_content' => $imageContentPaths,
        ]));

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Project successfully created!',
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'description_en' => 'required|string|max:1500',
            'description_fr' => 'required|string|max:1500',
            'description_ru' => 'required|string|max:1500',
            'image' => 'nullable|image|max:1024',
            'is_featured' => 'nullable|boolean',
            'priority' => 'nullable|integer|min:1',
            'image_content' => 'nullable|array',
            'image_content.*' => 'nullable|image|max:1024',
            'featured_image' => 'nullable|image|max:1024',
            'stack' => 'nullable|array',
            'stack.*' => 'nullable|string|max:255',
            'text_content_en' => 'nullable|array',
            'text_content_fr' => 'nullable|array',
            'text_content_ru' => 'nullable|array',
            'text_content_en.*' => 'nullable|string|max:1500',
            'text_content_fr.*' => 'nullable|string|max:1500',
            'text_content_ru.*' => 'nullable|string|max:1500',
            'image_alt_en' => 'nullable|string',
            'image_alt_fr' => 'nullable|string',
            'image_alt_ru' => 'nullable|string',
            'image_content_alt_en' => 'nullable|array',
            'image_content_alt_fr' => 'nullable|array',
            'image_content_alt_ru' => 'nullable|array',
            'website_link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $project->featured_image = $request->file('featured_image')->store('projects', 'public');
        }

        $imageContentPaths = $project->image_content ?? [];
        if ($request->hasFile('image_content')) {
            foreach ($request->file('image_content') as $image) {
                $imageContentPaths[] = $image->store('projects', 'public');
            }
        }

        $project->update(array_merge($validated, [
            'image' => $project->image,
            'featured_image' => $project->featured_image,
            'image_content' => $imageContentPaths,
        ]));

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Project successfully updated!',
        ]);
    }
}
