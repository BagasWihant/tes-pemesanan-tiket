<div class="w-[90%]">
    @if ($editMode)
        <div class="">
            <h3>Update Tiket</h3>
        </div>
        <form wire:submit.prevent="updateTiket" wire:ignore.self>
    @else
        <div class="">
            <h3>Tambah Tiket</h3>
        </div>
        <form wire:submit.prevent="tambahTiket" wire:ignore.self>
    @endif
        <div class="p-6 space-y-6">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="nama_tiket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Tiket</label>
                    <input type="text" wire:model.blur="inputNama" name="inputNama"
                        class="@error('inputNama') border-red-600 @enderror bg-gray-50 border   text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama Tiket">
                    @error('inputNama')
                        <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" wire:model="inputHarga"
                        class= "@error('inputHarga') border-red-600 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Harga">
                    @error('inputHarga')
                        <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuota
                        Tiket</label>
                    <input type="number" wire:model="inputKuota"
                        class= "@error('inputKuota') border-red-600 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Kuota Tiket">
                    @error('inputKuota')
                        <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai
                        dijual</label>

                    <div x-data x-init="flatpickr($refs.datetimewidget, { wrap: true, disableMobile: true, enableTime: true, dateFormat: 'd-m-Y H:i ', time_24hr: true });" x-ref="datetimewidget"
                        class="flatpickr container mx-auto col-span-6 sm:col-span-6">
                        <div class="flex">
                            <input x-ref="datetime" type="text" id="datetime" data-input wire:model="inputDate"
                                placeholder="Tanggal dan waktu"
                                class="@error('inputDate') border-red-600 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <a class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                                title="clear" data-clear>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1" viewBox="0 0 20 20"
                                    fill="#c53030">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @error('inputDate')
                        <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon</label>
                <button class="p-3 {{ $persen ? 'bg-blue-400' : 'border border-blue-400' }} rounded-lg"
                    wire:click.prevent="diskon_persen">Persentase</button>
                <button class="p-3 {{ $harga ? 'bg-blue-400' : 'border border-blue-400' }} rounded-lg"
                    wire:click.prevent="diskon_harga">Harga</button>
                <button class="p-3 {{ $noDis ? 'bg-blue-400' : 'border border-blue-400' }} rounded-lg"
                    wire:click.prevent="no_diskon">Tanpa Diskon</button>
                @if ($persen)
                    <div class="flex">
                        <input type="number" wire:model="inputDiskonPersen"
                            class= "@error('inputDiskonPersen') no-spinner border-red-600 @enderror bg-gray-50 border text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Diskon Berapa Persen ">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <p class="font-bold">%</p>
                        </span>
                    </div>
                    @error('inputDiskonPersen')
                        <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                    @enderror
                @endif
                @if ($harga)
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <p class="font-bold">Rp </p>
                        </span>
                        <input type="number" wire:model="inputDiskonHarga"
                            class= "@error('inputDiskonHarga') border-red-600 @enderror bg-gray-50 border text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Diskon Berapa Rupiah ">
                    </div>
                    @error('inputDiskonHarga')
                        <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                    @enderror
                @endif
            </div>
            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <div class="input-group">
                    <input type="file"
                        class="@error('inputImage') border-red-600 @enderror block w-full text-sm text-gray-900 border p-2.5 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="inputImage" name="inputImage" id="upload{{ $iteration }}">
                </div>
                @error('inputImage')
                    <span class="text-red-500" style="font-size:0.7rem !important;">{{ $message }}</span>
                @enderror
                @if ($editMode)
                    <div class="flex mt-4 justify-center items-center ">

                        @if ($oldImage)
                            <div class="flex justify-center items-center relative">

                                <div class="absolute bottom-0 p-2 text-white bg-slate-800 rounded-md">Old Image</div>
                                <img src="{{ Storage::url($oldImage) }}" class="w-1/3 bg-slate-600 p-1 rounded-md">
                            </div>
                            @endif
                            @if ($inputImage)
                            <div class="flex justify-center items-center relative">
                                <div class="absolute bottom-0 p-2 text-white bg-green-600 rounded-md">New Image</div>
                                <img src="{{ $inputImage->temporaryUrl() }}" class="w-1/3 bg-green-600 p-1 rounded-md">
                            </div>
                        @endif
                    </div>
                @else
                    @if ($inputImage)
                        <div class="flex justify-center items-center mt-4 ">
                            <img src="{{ $inputImage->temporaryUrl() }}" class="w-1/3 bg-slate-600 p-1 rounded-md">
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div
            class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button wire:click="mainPage" type="button"
                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            @if ($editMode)
                Update
            @else
                Tambah
            @endif
            </button>
        </div>
    </form>
</div>
