<?php

namespace App\Livewire;

use App\Models\Pesanan;
use Livewire\Component;

class AdminOrder extends Component
{

    public function konfirmasiPay($id) {
        
        $pesanan = Pesanan::select(['status_pemesanan','id','nomor_pesanan'])->find($id);
        $pesanan->status_pemesanan = 2;
        $pesanan->save();
        $pesanan->detail->tiket->kuota = $pesanan->detail->tiket->kuota - $pesanan->detail->qty;
        $pesanan->detail->tiket->save();
        
    }
    public function denyPay($id) {
        
        $pesanan = Pesanan::select(['status_pemesanan','id'])->find($id);
        $pesanan->status_pemesanan = 9;
        $pesanan->save();
        
    }
    public function render()
    {
        $data = Pesanan::get();
        return view('livewire.admin-order',compact('data'));
    }
}
