<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KontrakJual extends Model
{
    use HasFactory;

    protected $table = 'kontrak_juals';

    protected $fillable = ['tanggal','no','customer_id','kg','harga','ppnpercentage'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customers::class);
    }

    public function subtotal()
    {
        return $this->kg * $this->harga;
    }
    public function ppn()
    {
        return $this->subtotal() * ($this->ppnpercentage/100);
    }

    public function total()
    {
        return $this->subtotal() - $this->ppn();
    }
}
