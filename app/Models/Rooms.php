<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'stopId',
        'bedCount',
        'food',
        'roomType',
        'arrival',
        'departure',
        'hotel'
    ];

    private function stop(): BelongsTo {
        $this->belongsTo(Stops::class);
    }

    private function hotel(): BelongsTo {
        $this->belongsTo(Hotels::class);
    }
}
