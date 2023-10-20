<x-app-layout>
    <div class="w-full flex justify-center items-center h-screen">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Pemesanan Tiket </h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                <span class="text-3xl font-semibold">Rp</span>
                <span class="text-5xl font-extrabold tracking-tight">@rupiah($pay->total_harga) </span>
            </div>
            <ul role="list" class="space-y-5 my-7">
                <li class="flex justify-between space-x-3 items-center font-bold text-xl">
                    <span class="leading-tight text-gray-500 dark:text-gray-400">Pembayaran</span>
                    <span class="leading-tight text-gray-500 dark:text-gray-400">
                        @if ($pay->payment_metod == '1')
                            Qris
                        @else
                            Transfer Bank
                        @endif
                    </span>
                </li>
                <li class="flex justify-between space-x-3 font-bold text-xl ">

                    <span class="leading-tight text-gray-500 dark:text-gray-400">Diskon</span>
                    <span
                        class="leading-tight text-gray-500 dark:text-gray-400 line-through decoration-gray-500 decoration-2">Rp.
                        @rupiah($pay->diskon)</span>
                </li>
                <hr class="h-1 bg-gray-400">
                <li class="flex flex-col justify-between space-x-3 font-bold text-xl">
                    @if ($pay->payment_metod == '1')
                        <p class="text-center">Scan QRIS di bawah ini</p>
                        <img src="https://www.linkqu.id/wp-content/uploads/2023/08/Tumb-Logo-QRIS.jpg" alt="" srcset="">
                        @else
                        <div class="flex flex-col">

                            <p class="text-left">Transfer melalui Rekening berikut</p>
                            <p class="text-normal text-left text-red-500">BRI 01238179284927812</p>
                            {{-- <p class="text-normal text-left text-red-500"></p> --}}
                        </div>
                    @endif
                </li>

            </ul>
            <form method="POST" action="/payment-confirm/-{{ $pay->nomor_pesanan }}">
                @csrf
                <input type="hidden" name="id" value="{{ $pay->nomor_pesanan }}">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Konfirmasi
                    Pembayaran</button>
            </form>
        </div>
    </div>

</x-app-layout>
