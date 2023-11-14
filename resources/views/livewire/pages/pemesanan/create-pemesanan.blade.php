@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">

<script>
    // document.addEventListener('livewire:navigated', () => {
        function datepickerComponent() {
            return {
                start_date: null,
                initDatepicker() {
                    new Pikaday({
                        field: this.$refs.datepicker,
                        onSelect: (start_date) => {
                            this.start_date = moment(start_date).format('YYYY-MM-DD');
                            @this.set('form.start_date',this.start_date);
                        }
                    });
                }
            };
        }
        function datepickerComponentEnd() {
            return {
                end_date: null,
                initDatepickerEnd() {
                    new Pikaday({
                        field: this.$refs.datepicker,
                        onSelect: (end_date) => {
                            this.end_date = moment(end_date).format('YYYY-MM-DD');
                            @this.set('form.end_date',this.end_date);
                        }
                    });
                }
            };
        }
    // })
</script>
@endpush
<div>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">

            <div class="p-5 h-fit mb-4 rounded bg-gray-50 dark:bg-gray-800 space-y-10">
                <div class="flex justify-between items-center">
                    <div><h1 class="font-bold">Tambah Pemesanan</h1></div>
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Create</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                </div>
                <form wire:submit='store'>
                <div class=" sm:rounded-lg space-y-5">
                    <div>
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Transaksi</label>
                        <input
                            type="text"
                            id="name"
                            wire:model.live='form.kode_pesanan'
                            class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Kode Transaksi"
                            readonly
                        >
                    </div>
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pegawai</label>
                        <select wire:model='form.pegawai' autofocus id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Pegawai</option>
                            @foreach ($pegawai as $item)
                                <option value="{{ $item->id }}">{{ ucwords($item->user->name).'-'.ucwords($item->jabatan) }}</option>
                            @endforeach
                        </select>
                        @error('form.pegawai')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver</label>
                        <select wire:model='form.driver' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Driver</option>
                            @foreach ($driver as $item)
                                <option value="{{ $item->id }}">{{ ucwords($item->name).'-'.ucwords($item->no_telp) }}</option>
                            @endforeach
                        </select>
                        @error('form.driver')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pihak Persetujuan</label>
                        <select wire:model='form.persetujuan' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Pihak Persetujuan</option>
                            @foreach ($pihak as $item)
                                <option value="{{ $item->id }}">{{ ucwords($item->user->name).'-'.ucwords($item->jabatan) }}</option>
                            @endforeach
                        </select>
                        @error('persetujuan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kendaraan</label>
                        <select wire:model='form.kendaraan' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Kendaraan</option>
                            @foreach ($kendaraan as $item)
                                <option value="{{ $item->id }}">{{ ucwords($item->name).'-'.ucwords($item->plat_nomor) }}</option>
                            @endforeach
                        </select>
                        @error('form.kendaraan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan</label>
                        <textarea wire:model='form.reason' id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan Keperluan"></textarea>
                        @error('form.reason')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pemesanan</label>
                        <div class="flex items-center">
                            <div class="relative w-1/2" x-data="datepickerComponent()" x-init="initDatepicker()">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                  </svg>
                                </div>
                                <input
                                    x-ref="datepicker"
                                    wire:model.defer="form.start_date"
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="select date from">
                                @error('form.start_date')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div
                                class="relative w-1/2"
                                x-data="datepickerComponentEnd()" x-init="initDatepickerEnd()"
                            >
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                     <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                      <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input
                                    x-ref="datepicker"
                                    wire:model.defer='form.end_date'
                                    name="end_date"
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date end">
                                @error('form.end_date')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
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
