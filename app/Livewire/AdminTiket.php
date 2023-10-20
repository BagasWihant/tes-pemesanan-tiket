<?php

namespace App\Livewire;

use App\Models\Tiket;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminTiket extends Component
{
    use WithFileUploads;

    public $iteration, $localTypeDiskon = 9, $persen, $harga, $noDis, $inputDiskonHarga, $inputDiskonPersen, $kondisiModal, $tiket;
    public $editMode = false, $formPage = false, $oldImage,$deleteMode;

    #[Rule('required', message: 'Isi kolom Nama ')]
    public $inputNama;

    #[Rule('required|numeric', message: 'Isi kolom Harga')]
    public $inputHarga;

    #[Rule('required', message: 'Isi kolom Mulai dijual')]
    public $inputDate;

    #[Rule('required|numeric', message: 'Isi kolom Kuota')]
    public $inputKuota;

    #[Rule('required|image', message: 'Upload Gambar dulu')]
    public $inputImage;


    public function getTiket($id)
    {
        $this->tiket = Tiket::find($id);
        $this->kondisiModal = 1;

        $this->inputNama = $this->tiket->name;
        $this->inputHarga = $this->tiket->harga;
        $this->inputKuota = $this->tiket->kuota;
        $this->oldImage = $this->tiket->img;
        // dd($this->oldImage);

        if ($this->tiket->diskon_type === '0') {
            $this->harga = true;
            $this->persen = false;
            $this->noDis = false;
            $this->inputDiskonHarga = $this->tiket->diskon;
            $this->inputDiskonPersen = '';
        } elseif ($this->tiket->diskon_type === '1') {
            $this->persen = true;
            $this->harga = false;
            $this->noDis = false;
            $this->inputDiskonHarga = '';
            $this->inputDiskonPersen = $this->tiket->diskon;
        } else {
            $this->harga = false;
            $this->persen = false;
            $this->noDis = true;
        }

        $date = date('d-m-Y H:i', strtotime($this->tiket->berlaku_mulai));
        $this->inputDate = $date;
    }

    public function newTiketPage()
    {
        $this->formPage = true;
        $this->editMode = false;
    }
    public function mainPage()
    {
        $this->reset();
        $this->formPage = false;
        $this->editMode = false;
        $this->deleteMode = false;
    }

    public function editTiketPage($id)
    {
        $this->formPage = true;
        $this->editMode = true;
        $this->getTiket($id);
    }
    public function deleteTiketPage($id)
    {
        $this->deleteMode = true;
        $this->getTiket($id);
    }

    public function diskon_persen()
    {
        $this->persen = true;
        $this->harga = false;
        $this->noDis = false;
        $this->localTypeDiskon = 1;
    }
    public function diskon_harga()
    {
        $this->localTypeDiskon = 0;
        $this->persen = false;
        $this->noDis = false;
        $this->harga = true;
    }
    public function no_diskon()
    {
        $this->localTypeDiskon = 9;
        $this->persen = false;
        $this->harga = false;
        $this->noDis = true;
    }

    public function tambahTiket()
    {
        $this->validate();

        if ($this->inputImage != null) {
            $this->validate([
                'inputImage.*' => 'image|max:2017',
            ]);
            $imageFile = $this->inputImage->store('img', 'public');
        }

        if ($this->localTypeDiskon === 0) {
            // DIKON HARGA
            $diskon =  $this->inputDiskonHarga;
            $potongan = $diskon;
        } elseif ($this->localTypeDiskon === 1) {
            // DISKON PERSENTASE
            $diskon =  $this->inputDiskonPersen;
            $potongan = $this->inputHarga * ($diskon / 100);
        } else $diskon = $potongan = 0;


        $hargaJual = $this->inputHarga - $potongan;

        $str = strtotime($this->inputDate);
        $date = date('Y-m-d H:i', $str);
        Tiket::create([
            'name' => $this->inputNama,
            'harga' => $this->inputHarga,
            'kuota' => $this->inputKuota,
            'berlaku_mulai' => $date,
            'img' => $imageFile,
            'diskon' => $diskon,
            'harga_jual' => $hargaJual,
            'diskon_type' => $this->localTypeDiskon,
        ]);
        $this->mainPage();
    }

    public function updateTiket()
    {

        $this->tiket->name = $this->inputNama;
        $this->tiket->harga = $this->inputHarga;
        $this->tiket->kuota = $this->inputKuota;
        $this->tiket->diskon_type = $this->localTypeDiskon;

        if ($this->localTypeDiskon === 0) {
            // DIKON HARGA
            $diskon =  $this->inputDiskonHarga;
            $potongan = $diskon;
        } elseif ($this->localTypeDiskon === 1) {
            // DISKON PERSENTASE
            $diskon =  $this->inputDiskonPersen;
            $potongan = $this->inputHarga * ($diskon / 100);
        } else $diskon = $potongan = 0;


        $hargaJual = $this->inputHarga - $potongan;

        $this->tiket->diskon = $diskon;
        $this->tiket->harga_jual = $hargaJual;

        if ($this->inputImage != null) {
            $this->validate([
                'inputImage.*' => 'image|max:2017',
            ]);
            $imageFile = $this->inputImage->store('img', 'public');
            $this->tiket->img = $imageFile;
        }

        $str = strtotime($this->inputDate);
        $date = date('Y-m-d H:i', $str);
        $this->tiket->berlaku_mulai = $date;
        if ($this->tiket->update()) {
            $this->mainPage();
        }
    }

    public function deleteTiket()
    {
        $this->tiket->delete();
        $this->mainPage();
        
        // dispatch('close-modal');
    }

    public function render()
    {
        $data = Tiket::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin-tiket', compact('data'));
    }
}
