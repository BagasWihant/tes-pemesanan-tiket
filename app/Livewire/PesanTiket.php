<?php

namespace App\Livewire;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Nette\Utils\Random;

class PesanTiket extends Component
{
    public $id,$jumlah = 1,$total,$diskon,$diskonTemp,$tiket,$harga,$totalAwal;    
    public $metode=null,$alert=false;


    public function mount($id) {
        $this->id=$id;
        $this->tiket = Tiket::find($this->id);
        $this->harga = $this->tiket->harga;
        $this->totalAwal = $this->tiket->harga;
        $this->diskon = $this->tiket->harga - $this->tiket->harga_jual;
        $this->diskonTemp = $this->diskon;
        $this->total = $this->tiket->harga - $this->diskon;
        if(strtotime($this->tiket->berlaku_mulai) > strtotime(now())){
            $this->redirect('/');   
        }
        if($this->tiket->kuota < 1){
            $this->redirect('/');   
        }


    }

    public function increment() {
        if($this->jumlah >= $this->tiket->kuota) return false;
        $this->jumlah++;
        $this->totalAwal = $this->harga * $this->jumlah;
        $this->diskonTemp = $this->diskon * $this->jumlah;
        $this->total = ($this->harga * $this->jumlah) - $this->diskonTemp;
    }
    public function decrement() {
        if($this->jumlah <= 1) return false;
        $this->jumlah--;
        $this->totalAwal = $this->harga * $this->jumlah;
        $this->diskonTemp = $this->diskon * $this->jumlah;
        $this->total = ($this->harga * $this->jumlah) - $this->diskonTemp;
    }

    public function prosesPesanan() {
        if($this->metode === null){
            $this->alert = true;
            return false;
        }
        $this->alert = false;

        $no_pesan = Random::generate();
        Pesanan::create([
            'nomor_pesanan' => $no_pesan,
            'user_id' => Auth()->user()->id,
            'status_pemesanan' => 0,
            'diskon' => $this->diskonTemp,
            'total_harga' => $this->total,
            'payment_metod' => $this->metode,
        ]);
        DetailPesanan::create([
            'nomor_pesanan' => $no_pesan,
            'tiket_id' => $this->id,
            'qty' =>$this->jumlah
        ]);
        
        $this->redirect('/payment/'.$no_pesan);
    }

    public function render()
    {
        $tiket = $this->tiket;
        return view('livewire.pesan-tiket',compact('tiket'));
    }
}
