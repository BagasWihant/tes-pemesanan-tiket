<div class="w-full flex md:flex-row flex-col h-screen bg-gray-700 ">

    <div class="bg-blue-800 flex justify-center items-center w-4/5 rounded-r-3xl p-10">

        <div class="bg-blue-50 w-[80%] rounded-xl px-4 py-10 flex flex-col gap-4 bg-opacity-30 shadow-lg">
            <p class="text-gray-100 text-2xl font-bold items-center justify-center flex ">Rincian Pembelian Anda</p>
            <div class="flex justify-center">
                <img src="{{ Storage::url($tiket->img) }}" class="w-[40%] rounded-xl ">
            </div>
            <p class="text-2xl font-bold text-gray-100 text-center">Tiket {{ $tiket->name }} </p>
            <div class="w-full justify-center items-center flex">
                <div class="w-[80%] flex flex-col ">
                    <div class="flex justify-between px-4">
                        <p class="text-xl font-bold text-gray-100 ">Jumlah</p>
                        <div class="flex gap-1">
                            <button class="px-3 py-1 bg-slate-500 rounded-full text-white font-extrabold"
                                wire:click="decrement">-</button>
                            <p class="text-white font-extrabold items-center flex px-2">{{ $jumlah }}</p>
                            <button class="px-3 py-1 bg-slate-500 rounded-full text-white font-extrabold"
                                wire:click="increment">+</button>
                        </div>
                    </div>
                    <div class="flex justify-between px-4 text-xl">
                        <p class=" font-bold text-gray-100 tracking-widest">Harga</p>
                        <p class="text-white font-extrabold tracking-widest">Rp. {{ $harga }} </p>
                    </div>
                    <div class="flex justify-between px-4 text-xl ">
                        <p class=" font-bold text-gray-100 ">Total Harga</p>
                        <p class="text-white font-extrabold tracking-widest">Rp. {{ $totalAwal }}</p>
                    </div>

                    <div class="flex justify-between px-4 text-xl">
                        <p class="font-bold text-gray-100 ">Diskon</p>
                        <p class="text-red-700 font-bold tracking-widest line-through">
                            Rp. {{ $diskonTemp }}
                        </p>
                    </div>
                    <div class="flex justify-between px-4 text-xl ">
                        <p class=" font-bold text-gray-100 ">Total Pembayaran</p>
                        <p class="text-lime-400 font-extrabold tracking-widest">Rp. {{ $total }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" w-1/5 flex flex-col justify-around items-center">

        <div class="flex flex-col w-full items-center justify-center">

            @if($alert)
            <div class="flex items-center p-4 mb-4 text-sm text-red-100 border border-red-300 rounded-lg bg-red-700 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Mohon pilih Pembayaran dulu !</span>
                </div>
            </div>
            @endif


            <p class="text-white font-bold text-2xl">Pilih Pembayaran</p>
            <ul class="grid w-[60%] gap-6 ">
                <li>
                    <input type="radio" id="qris" name="metode" value="1" class="hidden peer" wire:model="metode"
                        required>
                    <label for="qris"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-800 bg-gray-400 rounded-xl cursor-pointer  peer-checked:border-gray-100 peer-checked:text-gray-100 peer-checked:bg-purple-600 hover:text-gray-800 hover:bg-purple-400 ">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Qris</div>
                        </div>
                        <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </label>
                </li>
                <li>
                    <input type="radio" id="bank" name="metode" value="2" class="hidden peer"  wire:model="metode">
                    <label for="bank"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-800 bg-gray-400 rounded-xl cursor-pointer  peer-checked:border-gray-100 peer-checked:text-gray-100 peer-checked:bg-purple-600 hover:text-gray-800 hover:bg-purple-400 ">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Transfer Bank</div>
                        </div>
                        <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </label>
                </li>
            </ul>
        </div>

        <div class="w-[90%]">
            <button class="p-5 text-xl font-bold text-white bg-purple-600 rounded-xl w-full" wire:click="prosesPesanan">
                Proses Pembayaran
            </button>
        </div>

    </div>
</div>
