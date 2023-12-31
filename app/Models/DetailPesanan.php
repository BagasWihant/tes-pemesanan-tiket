<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    function tiket() {
        return $this->belongsTo(Tiket::class,'tiket_id','id');    
    }

}
