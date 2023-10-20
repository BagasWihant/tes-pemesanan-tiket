<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use App\Models\Tiket;
use Livewire\Component;

class ListTiket extends Component
{
    public $search = '';

    public function render()
    {
        if($this->search=='') $data = Tiket::get();
        else $data = Tiket::where('name','like','%'.$this->search.'%')->get();
        return view('livewire.list-tiket',compact('data'));
    }
 
}
