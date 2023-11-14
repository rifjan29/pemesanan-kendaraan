<div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="p-5 h-fit mb-4 rounded bg-gray-50 dark:bg-gray-800 space-y-5">
                <div class="flex justify-between items-center">
                    <div><h1 class="font-bold">List Laporan</h1></div>
                    <button wire:click.prevent="export" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                        </svg>
                        Cetak Excel
                    </button>
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
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">Menunggu Persetujuan </span>
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
                                                @if ($item->vehicleReturn != null)
                                                    @if ($item->vehicleReturn->return_status == 'approved')
                                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Pengembalian Diterima</span>
                                                    @else
                                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Pengembalian Ditolak</span>
                                                        <p>{{ $item->vehicleReturn->desc }}</p>
                                                    @endif
                                                @else
                                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Update Pengembalian</span>

                                                @endif
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

</div>
