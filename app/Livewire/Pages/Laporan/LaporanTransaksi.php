<?php

namespace App\Livewire\Pages\Laporan;

use App\Exports\LaporanExport;
use App\Models\VehicleReservedModel;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LaporanTransaksi extends Component
{
    function export()  {
       return Excel::download(new LaporanExport,'laporan.xlsx');
    }
    public function render()
    {
        $query = VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre','vehicleReturn')->latest();
        $list = $query->paginate(10);
        return view('livewire.pages.laporan.laporan-transaksi',['data' => $list,]);
    }
}
