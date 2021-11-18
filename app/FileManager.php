<?php


namespace App;


use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class FileManager
{
    private UploadedFile $uploadedFile;

    public function store(UploadedFile $uploadedFile, User $user, string $publicity = 'local'): Photo
    {
        $this->uploadedFile = $uploadedFile;
        $link = $this->uploadedFile->storePublicly($publicity);

        return app(PhotoManager::class)->create([
            'photo' => $this->getSavedFileName($link),
            'content_type' => $this->uploadedFile->extension(),
            'checksum' => md5_file(storage_path() . '/app/' . $link),
        ], $user);
    }

    private function getSavedFileName(string $link): string
    {
        $explodedLink = explode('/', $link);

        return end($explodedLink);
    }
}
