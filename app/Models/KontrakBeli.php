<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontrakBeli extends Model
{
    use HasFactory;

    protected $table = 'kontrakbelis';

    protected $fillable = ['tanggal','no','supplier_id','kg','harga','ppnpercentage'];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(supplier::class);
    }
}
