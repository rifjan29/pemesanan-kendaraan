@push('js')
<script>
    const pemesanan = @json($pemesanan); // Convert PHP array to JSON
    console.log(pemesanan[0].vehicle.name);
    const seriesData = pemesanan.map(item => ({
        name: item.vehicle.name.toString(),
        data: [{ x: "Total Pemesanan Kendaraan", y: item.total }],
    }));
  const options = {
    colors: ["#1A56DB", "#FDBA8C"],
    series: seriesData,
        chart: {
        type: "bar",
        height: "320px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
            show: false,
        },
        },
        plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 8,
        },
        },
        tooltip: {
        shared: true,
        intersect: false,
        style: {
            fontFamily: "Inter, sans-serif",
        },
        },
        states: {
        hover: {
            filter: {
            type: "darken",
            value: 1,
            },
        },
        },
        stroke: {
        show: true,
        width: 0,
        colors: ["transparent"],
        },
        grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
            left: 2,
            right: 2,
            top: -14
        },
        },
        dataLabels: {
        enabled: false,
        },
        legend: {
        show: false,
        },
        xaxis: {
        floating: false,
        labels: {
            show: true,
            style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        },
        yaxis: {
        show: false,
        },
        fill: {
        opacity: 1,
        },
    }

    document.addEventListener('livewire:navigated', () => {
        if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
        }
    })


</script>
@endpush
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="p-5 h-fit mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">Welcome Back!</span> {{ ucwords(auth()->user()->name) }}.
                    </div>
                </div>

            </div>
           <div class="grid grid-cols-3 gap-4 mb-4">
              <div class="flex items-center p-5 justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <div class="flex flex-shrink-0 items-center justify-center bg-pink-200 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-pink-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                        </svg>
                    </div>
                    <div class="flex-grow flex flex-col ml-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 text-sm">Pegawai</span>
                        </div>
                        <h1 class="text-2xl font-extrabold">{{ $pegawai }}</h1>
                    </div>
              </div>
              <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800 p-5">
                    <div class="flex flex-shrink-0 items-center justify-center bg-yellow-200 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-yellow-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                        </svg>
                    </div>
                    <div class="flex-grow flex flex-col ml-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 text-sm">Driver</span>
                        </div>
                        <h1 class="text-2xl font-extrabold">{{ $driver }}</h1>
                    </div>
              </div>
              <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800 p-5">
                    <div class="flex flex-shrink-0 items-center justify-center bg-blue-200 h-16 w-16 rounded">
                        <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v2H7V2ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 4H8a1 1 0 0 1 0-2h5a1 1 0 0 1 0 2Zm0-4H8a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Z"/>
                        </svg>

                    </div>
                    <div class="flex-grow flex flex-col ml-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 text-sm">Total Pemesanan</span>
                        </div>
                        <h1 class="text-2xl font-extrabold">{{ $count_pesanan }}</h1>
                    </div>
              </div>
           </div>
           <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-full dark:bg-gray-800 col-span-2">
                    <div class="w-full p-4 md:p-6">

                        <div id="column-chart"></div>
                          <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-end items-center pt-5">
                              <!-- Button -->
                              <a
                                href="{{ route('list.laporan') }}"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                Leads Report
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                              </a>
                            </div>
                          </div>
                    </div>
                </div>
                <div class=" rounded bg-gray-50 h-fit dark:bg-gray-800 p-5 overflow-auto">
                    <div class="space-y-4">
                        <h4 class="font-extrabold">Log Activity</h4>
                        <hr>
                    </div>
                    <div class="p-5">
                        <ol class="relative border-s border-gray-200 dark:border-gray-700">
                            @forelse ($lastActivity as $item)
                                <li class="mb-10 ms-6">
                                    <span class="absolute flex items-center justify-center w-11 h-11 bg-blue-100 rounded-lg -start-6 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                        <small class="font-sans text-current">{{ $item->event }}</small>
                                    </span>
                                    <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                                        <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $item->created_at->diffForHumans() }}</time>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-300">{{ $item->causer->name }} {{ $item->description }}</span></div>
                                    </div>
                                </li>
                            @empty

                            @endforelse

                        </ol>
                    </div>
                </div>

           </div>

        </div>
    </div>
