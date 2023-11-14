<div>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">

            <div class="p-5 h-fit mb-4 rounded bg-gray-50 dark:bg-gray-800 space-y-10">
                <div class="flex justify-between items-center">
                    <div><h1 class="font-bold">Update Pemesanan</h1></div>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}" wire:navigate class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{ route('list.pemesanan') }}" wire:navigate class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">List Pemesanan</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Update Pemesanan</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="col-span-2">
                        <div id="accordion-collapse" data-accordion="collapse">
                            <h2 id="accordion-collapse-heading-1">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                <span>Detail Pemesanan  </span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">No Transaksi</dt>
                                        <dd class="text-sm font-semibold">{{ $data->no_transaksi }}</dd>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Jadwal</dt>
                                        <dd class="text-sm font-semibold">{{ \Carbon\Carbon::parse($data->date_start)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($data->date_end)->translatedFormat('d F Y') }}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Alasan</dt>
                                        <dd class="text-sm font-semibold">{{ ucwords($data->reason) }}</dd>
                                    </div>
                                </dl>
                            </div>
                            </div>
                            <h2 id="accordion-collapse-heading-2">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                <span>Detail Pegawai</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Nama Pegawai</dt>
                                        <dd class="text-sm font-semibold">{{ $data->employee->user->name }}</dd>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Jabatan</dt>
                                        <dd class="text-sm font-semibold">{{ $data->employee->jabatan }}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">No Telp</dt>
                                        <dd class="text-sm font-semibold">{{ ucwords($data->employee->no_telp) }}</dd>
                                    </div>
                                </dl>
                            </div>
                            </div>
                            <h2 id="accordion-collapse-heading-3">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                <span>Detail Driver</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Nama Driver</dt>
                                        <dd class="text-sm font-semibold">{{ $data->driver->name }}</dd>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">No Telp</dt>
                                        <dd class="text-sm font-semibold">{{ $data->driver->no_telp }}</dd>
                                    </div>
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Kendaraaan</dt>
                                        <dd class="text-sm font-semibold">{{ $data->vehicle->name }} - {{ $data->vehicle->merk }}</dd>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Plat Nomor</dt>
                                        <dd class="text-sm font-semibold">{{ $data->vehicle->plat_nomor }}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Jenis Bahan Bakar</dt>
                                        <dd class="text-sm font-semibold">{{ ucwords($data->vehicle->jenis_bahan_bakar) }} / Rp.{{ number_format($data->vehicle->harga) }}</dd>
                                    </div>
                                </dl>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative md:sticky top-0">
                            <div class="sticky top-0 bg-white p-5 w-full">
                                <form wire:submit='updateStatus'>
                                <div class="space-y-4">
                                     <div>
                                         <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Status</label>
                                         <select wire:model='status' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                             <option selected>Status</option>
                                             <option value="diterima">Diterima</option>
                                             <option value="ditolak">Ditolak</option>
                                         </select>
                                         @error('status')
                                             <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                         @enderror
                                     </div>
                                     <div>
                                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                                        <textarea wire:model='desc' id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukkan Catatan"></textarea>
                                        @error('desc')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                     </div>
                                </div>
                                <div class="flex justify-end my-5">
                                    <button type="submit" wire:loading.class="opacity-50" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <span wire:loading.remove>Save</span>
                                        <div wire:loading>Saving post...</div>

                                        <svg wire:loading.remove class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
