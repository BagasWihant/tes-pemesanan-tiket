<x-app-layout>

    <x-fixed.navbar-user />


    <div class="w-full flex justify-center pt-4">

        <div class="flex flex-col gap-4">
            @foreach ($data as $dt)
                <x-list-card>
                    <x-slot name="imgUrl">{{ Storage::url($dt->detail->tiket->img) }} </x-slot>
                    <x-slot name="name">{{ $dt->detail->tiket->name }} </x-slot>
                    <x-slot name='status'>{{ $dt->status_pemesanan }}</x-slot>
                    <x-slot name='pembayaran'>@rupiah($dt->total_harga)</x-slot>
                    @if ($dt->status_pemesanan == '0')
                        <x-slot name='linkPay'>{{ route('payment', ['noPesan' => $dt->nomor_pesanan]) }}</x-slot>
                    @elseif ($dt->status_pemesanan != '9')
                    <x-slot name='linkDetail'>{{ route('list-pesanan-detail', ['id' => $dt->id]) }}</x-slot>
                    @endif
                </x-list-card>
            @endforeach
        </div>


    </div>

</x-app-layout>
