<x-app-layout>

    <x-fixed.navbar-user />


    <div class="max-w-7xl mx-auto pt-4">
        <a href="{{url()->previous()}}" class="text-sm uppercase px-3 py-1 text-white mb-9 bg-blue-700 rounded-l-full rounded-r-md"> kembali</a>
        <div class=" bg-red-100 p-4 rounded-2xl mt-5">
            <p class="text-center text-2xl font-bold p-8">Rincian Pembelian </p>

            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Status Pesanan
                </div>
                <div class="text-lg font-bold">
                    {{$data->status_pemesanan}}
                </div>
            </div>

            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Nama Tiket
                </div>
                <div class="text-lg font-bold">
                    {{$data->detail->tiket->name}}
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Harga Tiket
                </div>
                <div class="text-lg font-bold">
                    Rp. @rupiah($data->detail->tiket->harga)
                </div>
            </div>


            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Jumlah Pembelian Tiket
                </div>
                <div class="text-lg font-bold">
                    {{$data->detail->qty}}
                </div>
            </div>


            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Potongan Harga
                </div>
                <div class="text-lg font-bold">
                    Rp. @rupiah($data->diskon)
                </div>
            </div>

            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Total Pembayaran 
                </div>
                <div class="text-lg font-bold">
                    Rp. @rupiah($data->total_harga)
                </div>
            </div>

            <div class="grid grid-cols-2 gap-11 p-2">
                <div class="text-lg">
                    Metode Pembayaran
                </div>
                <div class="text-lg font-bold">
                    @if($data->payment_metod == '1')
                     QRIS
                    @else
                    Transfer Bank
                    @endif
                </div>
            </div>


        </div>



    </div>

</x-app-layout>
