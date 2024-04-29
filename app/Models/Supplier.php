<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = ['nama','alias','alamat','email','notelp'];

    public function kontrakbeli(): HasMany
    {
        return $this->hasMany(KontrakBeli::class,'supplier_id', 'id');
    }
}
