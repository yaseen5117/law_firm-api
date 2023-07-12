<?php

namespace App\Services;

use App\helpers\FileData;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    /**
     * Upload a file.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string|null $disk
     * @param string|null $fileName
     * @return FileData
     */
    public function uploadFile(
        UploadedFile $file,
        string $directory,
        string $disk = null,
        string $fileName = null
    ) {
        // If no disk is specified, use the default disk from the filesystem config
        $disk = $disk ?? config('filesystems.default');
        // Generate a unique filename if not provided
        $fileName = $fileName ?? uniqid().".".$file->getClientOriginalExtension();
        if (!Storage::disk($disk)->exists($directory)) {
            // Directory doesn't exist, so create it
            Storage::disk($disk)->makeDirectory($directory);
        }
        $path = $file->storeAs($directory, $fileName, ['disk' => $disk]);
        return new FileData(
            name: $file->getClientOriginalName(),
            path: $path, 
            mimeType: $file->getMimeType(), 
            size: $file->getSize()
        );
    }

    /**
     * Delete a file.
     *
     * @param string $filePath
     * @param string|null $disk
     * @return bool
     */
    public function deleteFile(string $filePath, string $disk = null)
    {
        $disk = $disk ?? config('filesystems.default');
        return Storage::disk($disk)->delete($filePath);
    }

    /**
     * Get the URL for a stored file.
     *
     * @param string $filePath
     * @param string|null $disk
     * @return string|null
     */
    public function getFileUrl(string $filePath, ?string $disk = null)
    {
        $disk = $disk ?? config('filesystems.default');
        return Storage::disk($disk)->url($filePath);
    }
}
