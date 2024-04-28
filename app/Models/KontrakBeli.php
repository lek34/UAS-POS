<?php

namespace App\Models;

use Attribute;
use App\Models\PaymentKontrakBeli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function detailbayarkontrakbeli(): HasMany
    {
        return $this->hasMany(PaymentKontrakBeli::class);
    }

    public function getSisaBayar()
    {
        $totalHarga = 0;

        foreach ($this->detailbayarkontrakbeli as $detail) {
            $totalHarga += $detail->totalharga();
        }
        return $totalHarga;
    }

    public function muatdetail(): HasMany
    {
        return $this->hasMany(MuatDetail::class);
    }

}
