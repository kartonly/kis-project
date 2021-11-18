<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'agreement',
        'transport',
        'transfer'
    ];

    private function agreement(): HasOne {
        $this->hasOne(Agreement::class);
    }
}
