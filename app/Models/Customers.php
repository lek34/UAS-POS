<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = ['nama','alias','alamat','email','notelp'];

    public function kontrakjual(): HasMany
    {
        return $this->hasMany(kontrakjual::class);
    }
}
