<div
    class=" flex justify-between  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

    <div class="flex items-center justify-center w-full p-3">
        <img class="items-center justify-center flex aspect-auto h-52 rounded-t-lg" src="{{ $imgUrl }}"
            alt="product image" />
    </div>
    <div class="flex flex-col justify-between w-full p-3">
        @isset($berlaku)
            <span class="text-sm font-bold text-right m-0 p-0"> Berlaku mulai {{ $berlaku }}</span>
        @endisset
        @isset($status)
            @if ($status == '0')
                <span class="text-xs font-bold text-right m-0 p-0 text-yellow-500"> Menunggu Pembayaran</span>
            @elseif($status == '1')
                <span class="text-xs font-bold text-right m-0 p-0 text-gray-800"> Menunggu Konfimasi Pembayaran </span>
            @elseif($status == '2')
                <span class="text-xs font-bold text-right m-0 p-0 text-green-500"> Pesanan Selesai</span>
            @elseif($status == '9')
                <span class="text-xs font-bold text-right m-0 p-0 text-red-500"> Pesanan Ditolak</span>
            @endif
        @endisset

        <div class="">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"> {{ $name }} </h5>
        </div>
        <div class="flex flex-col">
            <div class="flex flex-col">
                @isset($diskon)
                    <span class="text-md font-bold text-red-500  line-through "> Rp. {{ $diskon }} </span>
                @endisset
                @isset($harga)
                    <span class="text-xl font-bold text-gray-800 dark:text-gray-200"> Rp. {{ $harga }} </span>
                @endisset
                @isset($pembayaran)
                    <span class="text-md font-bold text-gray-800 dark:text-gray-200"> Total Pembayaran</span>
                    <span class="text-md font-bold text-gray-800 dark:text-gray-200"> Rp. {{ $pembayaran }} </span>
                @endisset
            </div>
            @isset($stok)
                <p class="text-sm font-bold text-right">Tersisa {{ $stok }} </p>
            @endisset

            <div class="w-full flex justify-center h-full">
                @isset($canAccess)
                    <a href="{{ $link }}"
                        class="text-white text-lg w-full bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center ">Pesan
                        Sekarang</a>
                @endisset

                @isset($cantAccess)
                    <button
                        class="text-white text-lg w-full bg-gray-700 cursor-default hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center ">Cooming
                        Soon</button>
                @endisset

                @isset($habis)
                    <button
                        class="text-black text-lg w-full bg-gray-400 cursor-default hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center ">Tiket Habis</button>
                @endisset

                @isset($linkDetail)
                    <a href="{{$linkDetail}}" wire:navigate
                        class="text-white text-lg w-full bg-gray-700 cursor-default hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center ">Lihat Detail</a>
                @endisset

                @isset($linkPay)
                    <a href="{{$linkPay}}" wire:navigate
                        class="text-white text-lg w-full bg-green-700 cursor-default hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center ">Bayar</a>
                @endisset

            </div>
        </div>
    </div>
</div>
