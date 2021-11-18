<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransferDocs extends Model
{
    use HasFactory;

    protected $fillable = [
      'file',
      'voucherId'
    ];

    private function voucher(): BelongsTo {
        $this->belongsTo(Voucher::class);
    }
}
