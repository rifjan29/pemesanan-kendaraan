<?php

namespace App\Livewire\Forms;

use App\Models\MasterVehicleModel;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Form;

class VehicleFormPost extends Form
{
    public $id;

    #[Rule([
        'required',
    ])]
    public  $name,
            $merk,
            $jenis_bahan_bakar,
            $plat_nomor,
            $tahun,
            $riwayat_pemakaian,
            $harga;


    public function save() {
        $this->validate();
        try {
            $vehicle = new MasterVehicleModel;
            $vehicle->name = $this->name;
            $vehicle->jenis_bahan_bakar = $this->jenis_bahan_bakar;
            $vehicle->harga = (int) $this->harga;
            $vehicle->merk = $this->merk;
            $vehicle->plat_nomor = $this->plat_nomor;
            $vehicle->jadwal_service = Carbon::now();
            $vehicle->tahun = Carbon::now();
            $vehicle->desc = ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum dolore saepe nemo odio cupiditate? Non esse labore sequi nisi quibusdam expedita atque autem, reprehenderit corporis error laudantium, quis eaque quam?';
            $vehicle->riwayat_pemakaian = $this->riwayat_pemakaian;
            $vehicle->save();
            $this->reset();
            flash()->success('Data berhasil ditambahkan');
            return redirect('dashboard/master-data/vehicle');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/vehicle');
        }
    }

    public function edit($id) {
        $vehicle = MasterVehicleModel::find($id);
        $this->id = $vehicle->id;
        $this->name = $vehicle->name;
        $this->merk = $vehicle->merk;
        $this->jenis_bahan_bakar = $vehicle->jenis_bahan_bakar;
        $this->plat_nomor = $vehicle->plat_nomor;
        $this->tahun = $vehicle->tahun;
        $this->riwayat_pemakaian = $vehicle->riwayat_pemakaian;
        $this->harga = $vehicle->harga;
    }

    public function update(){
        $this->validate();
        try {
            $vehicle = MasterVehicleModel::find($this->id);
            $vehicle->id = $this->id;
            $vehicle->name = $this->name;
            $vehicle->merk = $this->merk;
            $vehicle->jenis_bahan_bakar = $this->jenis_bahan_bakar;
            $vehicle->plat_nomor = $this->plat_nomor;
            $vehicle->tahun = $this->tahun;
            $vehicle->riwayat_pemakaian = $this->riwayat_pemakaian;
            $vehicle->harga = (int) $this->harga;
            $vehicle->update();
            $this->reset();
            flash()->warning('Data Berhasil Diubah.');
            return redirect('dashboard/master-data/vehicle');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/vehicle');
        }
    }
}
