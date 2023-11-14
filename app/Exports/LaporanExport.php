<?php

namespace App\Exports;

use App\Models\VehicleReservedModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{

   public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre','vehicleReturn')->latest()->get(),
        ]);
    }
}
