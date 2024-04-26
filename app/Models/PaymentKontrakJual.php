<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentKontrakJual extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['tanggal', 'kontrak_jual_id', 'totalbayar'];

    public function kontrakjual(): BelongsTo
    {
        return $this->belongsTo(KontrakJual::class);
    }
}
