<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BongkarDetail extends Model
{
    use HasFactory;
    protected $table = 'bongkar_details';
    protected $fillable = ['muat_bongkar_id', 'kontrak_jual_id', 'tanggal', 'bruto', 'tarra', 'netto'];

    public function muatbongkar(): BelongsTo
    {
        return $this->belongsTo(MuatBongkar::class);
    }

    public function kontrakjual(): BelongsTo
    {
        return $this->belongsTo(KontrakJual::class, 'kontrak_jual_id', 'id');
    }
}
