<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait ImageTrait
{
    public function uploadImage($file, string $directory): array
    {
         $result["status"] = false;
        try {
            $fileInfo = $file->getClientOriginalName();
            $fileName = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $fileSize = $file->getSize();
            $file_name = $fileName.'-'.time().'.'.$extension;

            // Determine the base directory
            $basePath = app()->environment('production')
                ? base_path('../user-uploads') // Outside the public directory in production
                : public_path('user-uploads');

            $fullDirectory = $basePath . '/' . $directory;

            $path = app()->environment('production') ? $basePath . '/' . $directory . '/' . $file_name : '/user-uploads' . '/' . $directory . '/' . $file_name;

            $file->move($fullDirectory, $file_name);
            $result["status"] = true;
            $result["path"] = $path;
            $result["filename"] = $file_name;
            $result["size"] = $fileSize;
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            $result["message"] = "Something went wrong";
        }

        return $result;
    }

    public function deleteImage($file, $directory='/'): array
    {
        $result["status"] = false;
        try {

            $basePath = app()->environment('production')
                ? base_path('../user-uploads') // Outside the public directory in production
                : public_path('user-uploads');

            // $path = public_path($directory).$file;
            $path = $basePath . $directory . '/' . $file;
            if (file_exists($path)) {
                unlink($path);
            }
            $result["status"] = true;
        } catch (\Exception $e) {
            $result["message"] = "Something went wrong";
        }

        return $result;
    }
}
