<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakJual extends Model
{
    use HasFactory;

    protected $table = 'kontrak_juals';

    protected $fillable = ['tanggal','no','customer_id','kg','harga','ppnpercentage'];
}
