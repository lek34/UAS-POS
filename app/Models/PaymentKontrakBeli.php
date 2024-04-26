<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentKontrakBeli extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['tanggal', 'kontrak_beli_id', 'totalbayar'];

    public function kontrakbeli(): BelongsTo
    {
        return $this->belongsTo(KontrakBeli::class);
    }

    public function totalharga()
    {
        return $this->totalbayar;
    }
}
