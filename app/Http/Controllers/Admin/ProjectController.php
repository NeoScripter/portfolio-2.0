<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageResizer;

class ProjectController extends Controller
{
    protected $imageResizer;

    public function __construct(ImageResizer $imageResizer)
    {
        $this->imageResizer = $imageResizer;
    }

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
            Storage::delete($project->image_small);
            Storage::delete($project->image_medium);
            Storage::delete($project->image_tiny);
        }

        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
            Storage::delete($project->featured_image_small);
            Storage::delete($project->featured_image_medium);
            Storage::delete($project->featured_image_tiny);
        }

        if ($project->image_content) {
            foreach ($project->image_content as $imageSet) {
                foreach ($imageSet as $key => $path) {
                    if ($path) Storage::delete($path);
                }
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

        $directory = 'projects';

        $mainImagePaths = null;
        if ($request->hasFile('image')) {
            $fileKey = 'image';
            $mainImagePaths = $this->imageResizer->handleImageUpload($request, $fileKey, $directory);
        }

        $featuredImagePaths = null;
        if ($request->hasFile('featured_image')) {
            $fileKey = 'featured_image';
            $featuredImagePaths = $this->imageResizer->handleImageUpload(
                $request,
                $fileKey,
                $directory
            );
        }

        /* $imageContentPaths = [];
        if ($request->hasFile('image_content')) {
            foreach ($request->file('image_content') as $image) {
                $imageContentPaths[] = $image->store('projects', 'public');
            }
        } */

        $imageContentPaths = null;
        if ($request->hasFile('image_content')) {
            $fileKey = 'image_content';
            $imageContentPaths = $this->imageResizer->handleMultipleImagesUpload($request, $fileKey, $directory);
        }

        Project::create(array_merge($validated, [
            'image' => $mainImagePaths['original'],
            'image_small' => $mainImagePaths['small'],
            'image_medium' => $mainImagePaths['medium'],
            'image_tiny' => $mainImagePaths['tiny'],
            'featured_image' => $featuredImagePaths['original'],
            'featured_image_small' => $featuredImagePaths['small'],
            'featured_image_medium' => $featuredImagePaths['medium'],
            'featured_image_tiny' => $featuredImagePaths['tiny'],
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

        $directory = 'projects';

        $mainImageOriginal = $project->image;
        $mainImageMedium = $project->image_medium;
        $mainImageSmall = $project->image_small;
        $mainImageTiny = $project->image_tiny;

        if ($request->hasFile('image')) {
            $fileKey = 'image';
            $mainImagePaths = $this->imageResizer->handleFileUpdate(
                $request,
                $fileKey,
                $project,
                $directory
            );
            $mainImageOriginal = $mainImagePaths['original'];
            $mainImageMedium = $mainImagePaths['medium'];
            $mainImageSmall = $mainImagePaths['small'];
            $mainImageTiny = $mainImagePaths['tiny'];
        }

        $featuredImagePaths = $project->featured_image;
        if ($request->hasFile('featured_image')) {
            $fileKey = 'featured_image';
            $featuredImagePaths = $this->imageResizer->handleFileUpdate(
                $request,
                $fileKey,
                $project,
                $directory
            );
        }

        $featuredImageOriginal = $project->featured_image;
        $featuredImageMedium = $project->featured_image_medium;
        $featuredImageSmall = $project->featured_image_small;
        $featuredImageTiny = $project->featured_image_tiny;

        if ($request->hasFile('featured_image')) {
            $fileKey = 'featured_image';
            $featuredImagePaths = $this->imageResizer->handleFileUpdate(
                $request,
                $fileKey,
                $project,
                $directory
            );
            $featuredImageOriginal = $featuredImagePaths['original'];
            $featuredImageMedium = $featuredImagePaths['medium'];
            $featuredImageSmall = $featuredImagePaths['small'];
            $featuredImageTiny = $featuredImagePaths['tiny'];
        }

        /* $imageContentPaths = $project->image_content ?? [];
        if ($request->hasFile('image_content')) {
            foreach ($request->file('image_content') as $image) {
                $imageContentPaths[] = $image->store('projects', 'public');
            }
        } */

        $imageContentPaths = $project->image_content ?? [];
        if ($request->hasFile('image_content')) {
            $imageContentPaths = $this->imageResizer->handleMultipleImagesUpdate(
                $request,
                'image_content',
                $project->image_content,
                'projects'
            );
        }

        $project->update(array_merge($validated, [
            'image' => $mainImageOriginal,
            'image_small' => $mainImageSmall,
            'image_medium' => $mainImageMedium,
            'image_tiny' => $mainImageTiny,
            'featured_image' => $featuredImageOriginal,
            'featured_image_small' => $featuredImageSmall,
            'featured_image_medium' => $featuredImageMedium,
            'featured_image_tiny' => $featuredImageTiny,
            'image_content' => $imageContentPaths,
        ]));

        return redirect()->route('admin.projects.index')->with([
            'status' => 'success',
            'message' => 'Project successfully updated!',
        ]);
    }
}
