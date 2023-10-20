<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function pesan($id)
    {
        return view('pesan-tiket', ['id' => $id]);
    }

    public function history()
    {
        $data = Pesanan::where('user_id', Auth()->user()->id)->get();
        return view('list-pesanan', compact('data'));
    }

    public function payment($noPesan)
    {
        $pay = Pesanan::where([
            'nomor_pesanan'=> $noPesan,
            'user_id'=>Auth()->user()->id,
            ])->where('status_pemesanan','0')->first();
        if($pay) return view('payment', compact('pay'));

        return abort(401);
    }

    public function confirmPayment(Request $req)
    {
        if ($req->id && Auth()) {

            $pay = Pesanan::where([
                'nomor_pesanan' => $req->id,
                'user_id' => Auth()->user()->id
            ])->first();

            $pay->status_pemesanan = 1;
            if ($pay->save()) return redirect()->route('list-pesanan');

            return 'something wrong';
        }
    }

    public function listDetail($id)
    {
        $data = Pesanan::find($id);
        if($data->status_pemesanan ==0) $data->status_pemesanan = 'Pesanan dibuat / Menunggu Pembayaran';
        elseif($data->status_pemesanan ==1) $data->status_pemesanan = 'Pesanan dibayar / Menunggu Konfirmasi Pembayaran';
        elseif($data->status_pemesanan ==2) $data->status_pemesanan = 'Pesanan Selesai';
        // dd($data);
        return view('pesanan-detail',compact('data'));
    }
}
