<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuatBongkar extends Model
{
    use HasFactory;
    protected $table = 'muat_bongkars';

    protected $fillable = ['no','supir_id','armada_id','muat','bongkar','susut','potsusut','ongkos'];
}
