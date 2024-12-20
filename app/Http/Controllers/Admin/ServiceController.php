<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageResizer;

class ServiceController extends Controller
{
    protected $imageResizer;

    public function __construct(ImageResizer $imageResizer)
    {
        $this->imageResizer = $imageResizer;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $services = Service::query()->orderBy('priority', 'desc');

        if ($search) {
            $services->where('title_en', 'like', "%{$search}%");
        }

        $services = $services->paginate(5);

        return view('admin.services', compact('services'));
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
            Storage::delete($service->image_small);
            Storage::delete($service->image_medium);
            Storage::delete($service->image_tiny);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with([
            'status' => 'success',
            'message' => 'Service deleted!',
        ]);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
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
            'deadline_en' => 'required|string|max:255',
            'deadline_fr' => 'required|string|max:255',
            'deadline_ru' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024',
            'is_featured' => 'nullable|boolean',
            'priority' => 'nullable|integer|min:1',
            'image_alt_en' => 'nullable|string|max:255',
            'image_alt_fr' => 'nullable|string|max:255',
            'image_alt_ru' => 'nullable|string|max:255',
            'min_price' => 'nullable|integer|min:1',
        ]);

        $directory = 'services';

        $mainImagePaths = null;
        if ($request->hasFile('image')) {
            $fileKey = 'image';
            $mainImagePaths = $this->imageResizer->handleImageUpload($request, $fileKey, $directory);
        }

        Service::create(array_merge($validated, [
            'image' => $mainImagePaths['original'],
            'image_small' => $mainImagePaths['small'],
            'image_medium' => $mainImagePaths['medium'],
            'image_tiny' => $mainImagePaths['tiny'],
        ]));

        return redirect()->route('admin.services.index')->with([
            'status' => 'success',
            'message' => 'Service successfully created!',
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'description_en' => 'required|string|max:1500',
            'description_fr' => 'required|string|max:1500',
            'description_ru' => 'required|string|max:1500',
            'deadline_en' => 'required|string|max:255',
            'deadline_fr' => 'required|string|max:255',
            'deadline_ru' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024',
            'is_featured' => 'nullable|boolean',
            'priority' => 'nullable|integer|min:1',
            'image_alt_en' => 'nullable|string|max:255',
            'image_alt_fr' => 'nullable|string|max:255',
            'image_alt_ru' => 'nullable|string|max:255',
            'min_price' => 'required|integer|min:1',
        ]);

        $directory = 'services';

        $mainImageOriginal = $service->image;
        $mainImageMedium = $service->image_medium;
        $mainImageSmall = $service->image_small;
        $mainImageTiny = $service->image_tiny;

        if ($request->hasFile('image')) {
            $fileKey = 'image';
            $mainImagePaths = $this->imageResizer->handleFileUpdate(
                $request,
                $fileKey,
                $service,
                $directory
            );
            $mainImageOriginal = $mainImagePaths['original'];
            $mainImageMedium = $mainImagePaths['medium'];
            $mainImageSmall = $mainImagePaths['small'];
            $mainImageTiny = $mainImagePaths['tiny'];
        }

        $service->update(array_merge($validated, [
            'image' => $mainImageOriginal,
            'image_small' => $mainImageSmall,
            'image_medium' => $mainImageMedium,
            'image_tiny' => $mainImageTiny,
        ]));

        return redirect()->route('admin.services.index')->with([
            'status' => 'success',
            'message' => 'Service successfully updated!',
        ]);
    }
}

