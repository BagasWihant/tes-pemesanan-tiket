@if ($deleteMode)
    
<div class="absolute top-0 left-0 z-10 w-full h-full bg-slate-600 bg-opacity-30 flex items-center justify-center">
    <div class=" bg-blue-50 p-3 md:p-7 rounded-3xl">
        <div class="flex flex-col gap-3">

            <form wire:submit="deleteTiket">
                
                <div class="p-3">
                    <p class="text-xl">Apakah anda yakin menghapus Tiket {{ $inputNama }}</p>
                </div>

                <div class="flex justify-end p-3 gap-3">
                    <a wire:click='mainPage'
                        class="text-lg font-medium cursor-pointer border-blue-600 border hover:bg-blue-600 text-black dark:text-white rounded-md p-2">Batal</a>
                    <button type="submit"
                        class="text-lg font-medium bg-red-600 text-white rounded-md p-2">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endif