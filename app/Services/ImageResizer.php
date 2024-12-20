<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ImageResizer
{
    /**
     * Image sizes for resizing.
     */
    public const SIZES = [
        'small' => 350,
        'medium' => 700,
        'tiny' => 20,
    ];

    /**
     * Resize and store image in different sizes.
     *
     * @param Request $request
     * @param string $fileKey
     * @param string $directory
     * @return array
     */
    public function handleImageUpload(Request $request, string $fileKey, string $directory): array
    {
        $imagePath = null;
        $imageSmall = null;
        $imageMedium = null;
        $imageTiny = null;

        if ($request->hasFile($fileKey)) {
            $originalImage = $request->file($fileKey);
            $filename = time() . '.' . $originalImage->getClientOriginalExtension();
            $imagePath = $originalImage->store($directory, 'public');

            foreach (self::SIZES as $sizeName => $width) {
                $image = Image::read($originalImage);
                $resizedImage = $image->scale(width: $width)->toWebp(75);

                $path = "{$directory}/{$sizeName}/" . pathinfo($filename, PATHINFO_FILENAME) . ".webp";               $directoryPath = "public/{$directory}/{$sizeName}";

                if (!Storage::exists($directoryPath)) {
                    Storage::makeDirectory($directoryPath);
                }
                $resizedImage->save(Storage::path("public/{$path}"));

                if ($sizeName === 'small') $imageSmall = $path;
                if ($sizeName === 'medium') $imageMedium = $path;
                if ($sizeName === 'tiny') $imageTiny = $path;
            }
        }

        return [
            'original' => $imagePath,
            'small' => $imageSmall,
            'medium' => $imageMedium,
            'tiny' => $imageTiny,
        ];
    }

    /**
     * Update an existing image file and its resized versions.
     *
     * @param Request $request
     * @param string $fileKey
     * @param object $existingRecord
     * @param string $directory
     * @return array
     */
    public function handleFileUpdate(Request $request, string $fileKey, $existingRecord, string $directory): array
    {
        $imagePath = null;
        $imageSmall = null;
        $imageMedium = null;
        $imageTiny = null;

        if ($existingRecord->image) {
            Storage::disk('public')->delete($existingRecord->image);
            Storage::delete($existingRecord->image_small);
            Storage::delete($existingRecord->image_medium);
            Storage::delete($existingRecord->image_tiny);
        }

        $originalImage = $request->file($fileKey);
        $filename = time() . '.' . $originalImage->getClientOriginalExtension();
        $imagePath = $originalImage->store($directory, 'public');

        foreach (self::SIZES as $sizeName => $width) {
            $image = Image::read($originalImage);
            $resizedImage = $image->scale(width: $width)->toWebp(75);

            $path = "{$directory}/{$sizeName}/" . pathinfo($filename, PATHINFO_FILENAME) . ".webp";               $directoryPath = "public/{$directory}/{$sizeName}";

            if (!Storage::exists($directoryPath)) {
                Storage::makeDirectory($directoryPath);
            }
            $resizedImage->save(Storage::path("public/{$path}"));

            if ($sizeName === 'small') $imageSmall = $path;
            if ($sizeName === 'medium') $imageMedium = $path;
            if ($sizeName === 'tiny') $imageTiny = $path;
        }

        return [
            'original' => $imagePath,
            'small' => $imageSmall,
            'medium' => $imageMedium,
            'tiny' => $imageTiny,
        ];
    }

    public function handleMultipleImagesUpload(Request $request, string $fileKey, string $directory): array
    {
        $imageContentPaths = [];

        foreach ($request->file($fileKey) as $image) {
            $originalPath = $image->store($directory, 'public');
            $imageSmall = null;
            $imageMedium = null;
            $imageTiny = null;

            foreach (self::SIZES as $sizeName => $width) {
                $resizedImage = Image::read($image)
                    ->scale(width: $width)
                    ->toWebp(75);

                $filename = time() . '_' . uniqid() . '.' . pathinfo($originalPath, PATHINFO_FILENAME) . ".webp";

                $path = "{$directory}/{$sizeName}/{$filename}";
                $directoryPath = "public/{$directory}/{$sizeName}";

                if (!Storage::exists($directoryPath)) {
                    Storage::makeDirectory($directoryPath);
                }
                $resizedImage->save(Storage::path("public/{$path}"));

                if ($sizeName === 'small') $imageSmall = $path;
                if ($sizeName === 'medium') $imageMedium = $path;
                if ($sizeName === 'tiny') $imageTiny = $path;
            }

            $imageContentPaths[] = [
                'original' => $originalPath,
                'small' => $imageSmall,
                'medium' => $imageMedium,
                'tiny' => $imageTiny,
            ];
        }

        return $imageContentPaths;
    }

    public function handleMultipleImagesUpdate(Request $request, string $fileKey, array $existingRecords, string $directory): array
    {
        $imageContentPaths = [];

        $images = $request->file($fileKey);

        foreach ($images as $index => $image) {
            $originalPath = $image->store($directory, 'public');
            $imageSmall = null;
            $imageMedium = null;
            $imageTiny = null;

            // Delete existing images if they exist
            if (isset($existingRecords[$index])) {
                $existingRecord = $existingRecords[$index];

                if ($existingRecord['original']) Storage::disk('public')->delete($existingRecord['original']);
                if ($existingRecord['small']) Storage::delete($existingRecord['small']);
                if ($existingRecord['medium']) Storage::delete($existingRecord['medium']);
                if ($existingRecord['tiny']) Storage::delete($existingRecord['tiny']);
            }

            // Resize and save new images
            foreach (self::SIZES as $sizeName => $width) {
                $resizedImage = Image::read($image)
                    ->scale(width: $width)
                    ->toWebp(75);

                $filename = time() . '_' . uniqid() . '.' . pathinfo($originalPath, PATHINFO_FILENAME) . ".webp";

                $path = "{$directory}/{$sizeName}/{$filename}";
                $directoryPath = "public/{$directory}/{$sizeName}";

                if (!Storage::exists($directoryPath)) {
                    Storage::makeDirectory($directoryPath);
                }
                $resizedImage->save(Storage::path("public/{$path}"));

                if ($sizeName === 'small') $imageSmall = $path;
                if ($sizeName === 'medium') $imageMedium = $path;
                if ($sizeName === 'tiny') $imageTiny = $path;
            }

            $imageContentPaths[] = [
                'original' => $originalPath,
                'small' => $imageSmall,
                'medium' => $imageMedium,
                'tiny' => $imageTiny,
            ];
        }

        return $imageContentPaths;
    }
}
