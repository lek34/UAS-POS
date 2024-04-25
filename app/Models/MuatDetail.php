<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MuatDetail extends Model
{
    use HasFactory;

    protected $table = 'muat_details';
    protected $fillable = ['muat_bongkar_id', 'kontrak_beli_id', 'tanggal', 'bruto', 'tarra', 'netto'];
    public function muatbongkar(): BelongsTo
    {
        return $this->belongsTo(MuatBongkar::class);
    }

    public function kontrakbeli(): BelongsTo
    {
        return $this->belongsTo(KontrakBeli::class, 'kontrak_beli_id', 'id');
    }

}
