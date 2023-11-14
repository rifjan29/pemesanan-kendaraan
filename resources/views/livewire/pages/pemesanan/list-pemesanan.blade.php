<div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="p-5 h-fit mb-4 rounded bg-gray-50 dark:bg-gray-800 space-y-5">
                <div class="flex justify-between items-center">
                    <div><h1 class="font-bold">List Pemesanan</h1></div>
                    <a href="{{ route('create.pemesanan') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                        </svg>
                        Tambah Data
                    </a>
                </div>
                <x-notification></x-notification>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Pegawai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Kendaraan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Driver
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status Pesanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pihak Yang Menyetujui
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jadwal
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-col pb-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Nama Pegawai</dt>
                                                <dd class="text-sm font-semibold">{{ $item->employee->user->name }}</dd>
                                            </div>
                                            <div class="flex flex-col py-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Jabatan</dt>
                                                <dd class="text-sm font-semibold">{{ $item->employee->jabatan }}</dd>
                                            </div>
                                            <div class="flex flex-col pt-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">No Telp</dt>
                                                <dd class="text-sm font-semibold">{{ ucwords($item->employee->no_telp) }}</dd>
                                            </div>
                                        </dl>
                                    </td>
                                    <td class="px-6 py-4">
                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-col pb-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Kendaraaan</dt>
                                                <dd class="text-sm font-semibold">{{ $item->vehicle->name }} - {{ $item->vehicle->merk }}</dd>
                                            </div>
                                            <div class="flex flex-col py-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Plat Nomor</dt>
                                                <dd class="text-sm font-semibold">{{ $item->vehicle->plat_nomor }}</dd>
                                            </div>
                                            <div class="flex flex-col pt-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Jenis Bahan Bakar</dt>
                                                <dd class="text-sm font-semibold">{{ ucwords($item->vehicle->jenis_bahan_bakar) }} / Rp.{{ number_format($item->vehicle->harga) }}</dd>
                                            </div>
                                        </dl>
                                    </td>
                                    <td class="px-6 py-6">
                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-col pb-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Nama Driver</dt>
                                                <dd class="text-sm font-semibold">{{ $item->driver->name }}</dd>
                                            </div>
                                            <div class="flex flex-col py-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">No Telp</dt>
                                                <dd class="text-sm font-semibold">{{ $item->driver->no_telp }}</dd>
                                            </div>

                                        </dl>

                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->status_reserved == 'diterima')
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Diterima</span>
                                        @elseif ($item->status_reserved == 'pending')
                                            @hasrole('pihak')
                                                <a href="{{ route('update.pemesanan',$item->id) }}" wire:navigate class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">Menunggu Persetujuan </a>
                                            @else
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">Menunggu Persetujuan </span>
                                            @endhasrole

                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ ucwords($item->vehicleAgre->user->name) }}
                                        <hr>
                                        <span class="text-xs">Jabatan : {{ ucwords($item->vehicleAgre->jabatan) }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($item->date_start)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item->date_end)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div>
                                            <div class="inline-flex items-center rounded-md shadow-sm" role="group">
                                                @if ($item->status_reserved == 'diterima')
                                                    @if ($item->vehicleReturn != null)
                                                        @if ($item->vehicleReturn->return_status == 'approved')
                                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Pengembalian Diterima</span>
                                                        @else
                                                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Pengembalian Ditolak</span>
                                                            <p>{{ $item->vehicleReturn->desc }}</p>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('update.pengembalian',$item->id) }}" wire:navigate type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                            <svg class="w-3 h-3 me-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                                            </svg>
                                                            Update Pengembalian
                                                        </a>

                                                    @endif
                                                @else
                                                    <a href="{{ route('edit.driver',$item->id) }}" wire:navigate type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        <svg class="w-3 h-3 me-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endif
                                                <button wire:click.prevent="deleteId({{ $item->id }})" data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    <svg class="w-3 h-3 me-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                        <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                                                    </svg>

                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $data->links() }}
                </div>

            </div>
        </div>
    </div>
    {{-- DELETE CONFIRM --}}
    <div wire:ignore.self id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Delete Confirm
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Are you sure want to delete?
                    </p>

                </div>
                <!-- Modal footer -->
                <div class="flex place-content-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button wire:click.prevent="delete()" data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button  data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>

                </div>
            </div>
        </div>

    </div>
</div>
