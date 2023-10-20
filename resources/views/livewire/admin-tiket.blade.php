<div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            @include('components.fixed.modal-admin-tiket')

            @if ($formPage)
                @include('components.fixed.form-tiket-page')
            @else
                <div class="flex justify-end">
                    <button type="button" type="button" wire:click="newTiketPage"
                        class="text-white  bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Tambah Tiket</button>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sisa
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mulai Berlaku Dari
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    Diskon
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    Harga Jual
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($data as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4 w-[10%]">
                                        <img src="{{ Storage::url($item->img) }}" class="w-full">
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $item->kuota }}
                                    </td>
                                    <td class="px-6 py-4 text-left">
                                        Rp. {{ $item->harga }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ date('d-m-Y H:i', strtotime($item->berlaku_mulai)) }}
                                    </td>
                                    <td class="px-6 py-4 text-left">
                                        @if ($item->diskon_type == 0)
                                            <span class="font-bold"> Rp. {{ $item->diskon }} </span>
                                        @elseif($item->diskon_type == 1)
                                            <span class="font-bold"> {{ $item->diskon }} %</span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-left">
                                        Rp. {{ $item->harga_jual }}
                                    </td>
                                    <td class="px-6 py-4  text-right">
                                        <button
                                            wire:click="editTiketPage({{ $item->id }})"class="font-medium text-blue-700 dark:text-blue-400 hover:bg-blue-500 hover:text-white border border-blue-500 rounded-lg px-2 py-1">Edit</button>
                                        <button wire:click="deleteTiketPage({{ $item->id }})"
                                            data-modal-target="modalDelete" data-modal-toggle="modalDelete"
                                            class="font-medium text-red-700 dark:text-red-400 hover:bg-red-500 hover:text-white border border-red-500 rounded-lg px-2 py-1">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>


</div>
