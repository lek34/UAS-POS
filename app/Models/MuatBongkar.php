<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MuatBongkar extends Model
{
    use HasFactory;
    protected $table = 'muat_bongkars';

    protected $fillable = ['no', 'supir_id', 'armada_id', 'muat', 'bongkar', 'susut', 'potsusut', 'ongkos', 'pphpercentage'];

    public function armada(): BelongsTo
    {
        return $this->belongsTo(Armada::class);
    }

    public function supir(): BelongsTo
    {
        return $this->belongsTo(Supir::class);
    }

    public function muatdetail(): HasMany
    {
        return $this->hasMany(MuatDetail::class);
    }
    public function bongkardetail(): HasMany
    {
        return $this->hasMany(BongkarDetail::class);
    }

    public function totalpotongan()
    {
        return $this->susut * $this->potsusut;
    }

    public function totalongkos()
    {
        return $this->bongkar * $this->ongkos;
    }
    public function ongkosdipotong()
    {
        return $this->totalongkos() - $this->totalpotongan();
    }
    public function pph()
    {
        return $this->ongkosdipotong() * ($this->pphpercentage / 100);
    }
    public function totaldibayar()
    {
        return $this->ongkosdipotong() - $this->pph();

    }

    public function hargabeli()
    {
        $total = 0;
        foreach ($this->muatdetail as $item) {
            $total += ($item->netto * $item->kontrakbeli->harga) + ($item->netto * $item->kontrakbeli->harga * $item->kontrakbeli->ppnpercentage / 100);
        }
        return $total;
    }
    public function hargajual()
    {
        $total = 0;
        foreach ($this->bongkardetail as $item) {
            $total += ($item->netto * $item->kontrakjual->harga) + ($item->netto * $item->kontrakjual->harga * $item->kontrakjual->ppnpercentage / 100);
        }
        return $total;
    }

    public function labakotor()
    {
        return $this->hargajual() - $this->hargabeli();
    }
    public function lababersih()
    {
        return $this->labakotor() - $this->totaldibayar();
    }
}
