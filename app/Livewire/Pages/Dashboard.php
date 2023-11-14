<?php

namespace App\Livewire\Pages;

use App\Models\MasterDriverModel;
use App\Models\UsersEmployeeModel;
use App\Models\VehicleReservedModel;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Dashboard extends Component
{
    public function render()
    {
        $pemesanan = VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre','vehicleReturn')
                    ->latest()
                    ->groupBy('vehicle_id') // Sesuaikan dengan nama kolom yang merupakan ID kendaraan
                    ->selectRaw('vehicle_id, COUNT(*) as total')
                    ->get();
        $lastActivity = Activity::all()->take(3);
        $pegawai = UsersEmployeeModel::count();
        $driver = MasterDriverModel::count();
        $count_pesanan = VehicleReservedModel::count();
        return view('dashboard',[
            'pemesanan'=>$pemesanan,
            'lastActivity' => $lastActivity,
            'pegawai' => $pegawai,
            'driver' => $driver,
            'count_pesanan' => $count_pesanan,
        ]);
    }
}
