<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tourists extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'second_name',
        'passportId',
        'PassportSeries',
        'agreement'
    ];

    private function agreement(): BelongsTo {
        $this->belongsTo(Agreement::class);
    }
}
