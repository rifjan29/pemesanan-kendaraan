<?php

namespace App\Livewire\Pages\Pemesanan;

use App\Models\VehicleReservedModel;
use Livewire\Component;

class UpdatePemesanan extends Component
{
    public $id;

    public $data;

    public $status,$desc;

    public function mount()  {
        $this->data = VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre')->find($this->id);
    }
    function updateStatus(){
        $vehicle = VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre')->find($this->id);
        $vehicle->status_reserved = $this->status;
        $vehicle->desc = $this->desc;
        $vehicle->update();
        flash()->success('Pemesanan Kendaraan Berhasil diupdate.');
        return redirect('dashboard/list-pemesanan');
    }

    public function render()
    {
        return view('livewire.pages.pemesanan.update-pemesanan');
    }
}
