<?php

namespace Database\Seeders;

use App\Models\MasterVehicleModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $vehicle = new MasterVehicleModel;
        $vehicle->name = 'Dump Truck';
        $vehicle->jenis_bahan_bakar = 'solar';
        $vehicle->harga = 2000000;
        $vehicle->merk = 'Suzuki';
        $vehicle->plat_nomor = 'P1241AN';
        $vehicle->jadwal_service = Carbon::now();
        $vehicle->tahun = Carbon::now();
        $vehicle->desc = ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum dolore saepe nemo odio cupiditate? Non esse labore sequi nisi quibusdam expedita atque autem, reprehenderit corporis error laudantium, quis eaque quam?';
        $vehicle->riwayat_pemakaian = 'baru';
        $vehicle->save();
    }
}
