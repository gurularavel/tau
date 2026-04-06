<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileManagable
{
    private int $mode = 0755;

    private string $path = 'uploads';

    public function copyFile(string $sourcePath, string $destinationFolder): string
    {
        if (!file_exists($path = public_path() . "/$this->path/$destinationFolder")) {
            mkdir($path, recursive: true);
        }

        $name = File::name($sourcePath) . uniqid() . '.' . File::extension($sourcePath);

        if (!file_exists($filePath = $path . '/' . $name)) {
            File::copy($sourcePath, $filePath);
        }

        return $name;
    }

    public function multiUpload(string $folder, array $files): array|RedirectResponse
    {
        try {
            $result = [];

            foreach ($files as $file) {
                $result[] = $this->uploadFile($folder, $file);
            }

            return $result;
        } catch (Exception $e) {
            logger()->channel('app')->error($e->getMessage());
            return back()->with('error', __('error_images'));
        }
    }


    public function multiDelete(string $folder, array $files): void
    {
        try {
            foreach ($files as $file) {
                $this->deleteFile($folder, $file);
            }
        } catch (Exception $e) {
            logger()->channel('app')->error($e->getMessage());
        }
    }

    public function removeOldUploadNewFile(string $folder, UploadedFile $newFile, ?string $oldFile = null): string
    {
        if ($oldFile) {
            $this->deleteFile($folder, $oldFile);
        }

        return $this->uploadFile($folder, $newFile);
    }

    public function upload(string $folder, UploadedFile $file): string|RedirectResponse
    {
        try {
            $this->makeFolder($folder);
            return $this->uploadFile($folder, $file);
        } catch (Exception $e) {
            logger()->channel('app')->error($e->getMessage());
            return back()->with('error', __('error_image'));
        }
    }

    private function deleteFile(string $folder, string $file = null): void
    {
        try {
            if (File::exists($path = public_path($this->path . "/$folder/$file"))) {
                File::delete($path);
            }
        } catch (Exception $e) {
            logger()->channel('app')->error($e->getMessage());
        }
    }

    private function makeFolder(string $folder): void
    {
        if (File::missing($path = public_path($this->path))) {
            File::makeDirectory($path, $this->mode, true);
        }

        if (File::missing($path = public_path($this->path . "/$folder"))) {
            File::makeDirectory($path, $this->mode, true);
        }
    }

    private function remakeFolder(string $folder): void
    {
        $this->cleanFolder($folder);
        $this->makeFolder($folder);
    }

    private function cleanFolder(string $folder): void
    {
        if (File::missing(public_path($this->path))) {
            return;
        }

        if (File::missing(public_path($this->path . "/$folder"))) {
            return;
        }

        File::cleanDirectory(public_path($this->path . "/$folder"));
    }

    private function uploadFile(string $folder, UploadedFile $file): string
    {
        $name = uniqid() . '.' . str($file->extension())->lower();
        $file->move(public_path($this->path . "/$folder"), $name);
        return $name;
    }
}
