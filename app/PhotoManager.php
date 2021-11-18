<?php


namespace App;


use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PhotoManager
{
    private ?Photo $photo;

    public function __construct(Photo $photo = null)
    {
        $this->photo = $photo;
    }

    public function create(array $params, User $user): Photo
    {
        $this->photo = app(Photo::class);
        $this->photo->fill($params);
        $this->photo->user()->associate($user);
        $this->photo->save();

        return $this->photo;
    }

    public function delete(): ?bool
    {
        $delete = Storage::delete($this->photo . 'local/' . $this->photo->photo);

        if ($delete) {
            return $this->photo->delete();
        } else {
            return false;
        }
    }
}
