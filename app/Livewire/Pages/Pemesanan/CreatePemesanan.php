<?php

namespace App\Livewire\Pages\Pemesanan;

use App\Livewire\Forms\PemesananFormPost;
use App\Models\MasterDriverModel;
use App\Models\MasterVehicleModel;
use App\Models\User;
use App\Models\UsersEmployeeModel;
use Livewire\Component;

class CreatePemesanan extends Component
{
    public PemesananFormPost $form;

    function mount() {
        $this->form->kode();
    }
    function store() {
        $this->form->save();
    }
    public function render()
    {
        $pegawai = UsersEmployeeModel::with('user')->where('status','aktif')->where('jabatan','pegawai')->get();
        $driver = MasterDriverModel::where('status','aktif')->get();
        $pihak = UsersEmployeeModel::with('user')->where('status','aktif')->where('jabatan','!=','pegawai')->get();
        $kendaraan = MasterVehicleModel::latest()->get();
        return view('livewire.pages.pemesanan.create-pemesanan',[
            'pegawai' => $pegawai,
            'driver' => $driver,
            'pihak' => $pihak,
            'kendaraan' => $kendaraan,
        ]);
    }
}
