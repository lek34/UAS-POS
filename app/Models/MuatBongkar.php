<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MuatBongkar extends Model
{
    use HasFactory;
    protected $table = 'muat_bongkars';

    protected $fillable = ['no', 'supir_id', 'armada_id', 'muat', 'bongkar', 'susut', 'potsusut', 'ongkos'];

    public function muatdetail(): HasMany
    {
        return $this->hasMany(MuatDetail::class);
    }

    public function totalpotongan(){
        return $this->susut * $this->potsusut;
    }

    public function totalongkos(){
        return $this->bongkar * $this->ongkos;
    }
}
