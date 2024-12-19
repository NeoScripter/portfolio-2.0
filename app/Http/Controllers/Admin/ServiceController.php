<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
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

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create(array_merge($validated, [
            'image' => $imagePath,
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
            'min_price' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $service->image = $request->file('image')->store('services', 'public');
        }

        $service->update(array_merge($validated, [
            'image' => $service->image,
        ]));

        return redirect()->route('admin.services.index')->with([
            'status' => 'success',
            'message' => 'Service successfully updated!',
        ]);
    }
}


/*
$table->string('image')->nullable();
$table->string('image_alt_en')->nullable();
$table->string('image_alt_fr')->nullable();
$table->string('image_alt_ru')->nullable();
$table->string('title_en');
$table->string('title_fr');
$table->string('title_ru');
$table->string('deadline_en');
$table->string('deadline_fr');
$table->string('deadline_ru');
$table->string('description_en');
$table->string('description_fr');
$table->string('description_ru');
$table->boolean('is_featured')->default(true);
$table->integer('priority')->default(1);
$table->integer('min_price')->default(100); */
