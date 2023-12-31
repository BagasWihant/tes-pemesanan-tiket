<div class="max-w-7xl flex flex-col gap-4">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="search" id="default-search" wire:model.live="search"
            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Cari Tiket ..." required>
        </div>
    @foreach ($data as $dt)
        <x-list-card>
            <x-slot name="imgUrl">{{ Storage::url($dt->img) }} </x-slot>
            <x-slot name="name">{{ $dt->name }} </x-slot>
            <x-slot name="harga">{{ $dt->harga_jual }} </x-slot>
            <x-slot name="berlaku">{{ date('d-M-Y H:i', strtotime($dt->berlaku_mulai)) }} </x-slot>
            <x-slot name="stok">{{ $dt->kuota }} </x-slot>
            <x-slot name="diskon">{{ $dt->harga }} </x-slot>
            @if (strtotime($dt->berlaku_mulai) < strtotime(now()))
                <x-slot name="link">{{ url('pesan/' . $dt->id) }} </x-slot>
                @if ($dt->kuota == '0')
                    <x-slot name="habis">true</x-slot>
                @else
                    <x-slot name="canAccess">true</x-slot>
                @endif
            @else
                <x-slot name="cantAccess">false</x-slot>
            @endif
        </x-list-card>
    @endforeach
</div>
