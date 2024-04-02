<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontrakBeli extends Model
{
    use HasFactory;

    protected $table = 'kontrak_belis';

    protected $fillable = ['tanggal', 'no', 'supplier_id', 'kg', 'harga', 'ppnpercentage'];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(supplier::class);
    }

    public function subtotal()
    {
        return $this->kg * $this->harga;
    }
    public function ppn()
    {
        return $this->subtotal() * ($this->ppnpercentage / 100);
    }

    public function total()
    {
        return $this->subtotal() + $this->ppn();
    }


}
