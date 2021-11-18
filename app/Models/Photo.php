<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'user_id',
        'content_type',
        'checksum',
    ];

    public function getFilePath()
    {
        return storage_path() . '/app/local/' . $this->photo;
    }

    public function getBase64(): array
    {
        $storageFile = Storage::get('local/' . $this->photo);
        return [
            'base64' => base64_encode($storageFile),
            'content_type' => $this->content_type,
        ];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
