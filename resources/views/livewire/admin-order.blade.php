<div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nomor Pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pembeli
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Harga
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Diskon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pembayaran Diterima
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $item->nomor_pesanan }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->user->name }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->detail->qty }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    Rp. @rupiah($item->detail->tiket->harga * $item->detail->qty)
                                </td>
                                <td class="px-6 py-4 text-center">
                                    Rp. @rupiah($item->diskon)
                                </td>
                                <td class="px-6 py-4 text-left">
                                    <span class="font-bold"> Rp. @rupiah($item->total_harga) </span>
                                </td>
                                <td class="px-6 py-4  ">
                                    @if ($item->status_pemesanan == '0')
                                    <p class="text-yellow-700 text-md font-bold">Belum dibayar</p>
                                    @elseif ($item->status_pemesanan == '1')
                                    <button wire:click="konfirmasiPay({{ $item->id }})"
                                        class="font-medium text-green-700 dark:text-green-400 hover:bg-green-500 hover:text-white border border-green-500 rounded-lg px-2 py-1">Konfirmasi
                                        Pembayaran</button>
                                    <button wire:click="denyPay({{ $item->id }})"
                                        class="font-medium text-red-700 dark:text-red-400 hover:bg-red-500 hover:text-white border border-red-500 rounded-lg px-2 py-1">Tolak Pembayaran</button>
                                        
                                    @elseif ($item->status_pemesanan == '2')
                                    <p class="text-green-700 text-md font-bold">Pesanan Selesai</p>
                                    @else
                                    <p class="text-red-700 text-md font-bold">Pesanan Ditolak</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
