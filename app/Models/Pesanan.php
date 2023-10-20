<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    function detail() {
        return $this->belongsTo(DetailPesanan::class,'nomor_pesanan','nomor_pesanan');    
    }
    
    function user() {
        return $this->belongsTo(User::class,'user_id','id');    
        
    }
}
