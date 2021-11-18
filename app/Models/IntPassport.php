<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class IntPassport extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientId',
        'type',
        'issueOrg',
        'citizenship'
    ];

    protected $casts = [
        'issueDate' => 'date',
        'endDate' => 'date'
    ];

    private function client(): HasOne {
        return $this->hasOne(Clients::class);
    }
}
