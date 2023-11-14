<?php

namespace App\Livewire\Pages\Pemesanan;

use App\Models\VehicleReservedModel;
use App\Models\VehicleReturn;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePengembalian extends Component
{

    use WithFileUploads;

    public $id;

    public $data;

    public $status,$desc, $photo;

    public function mount()  {
        $this->data = VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre')->find($this->id);
    }
    function updateStatus(){
        $date = Carbon::now()->format('ymdhis');
        try {
            $vehicle_return = new VehicleReturn;
            $vehicle_return->vehicle_reserved_id = $this->id;
            $vehicle_return->return_status = $this->status;
            if ($this->photo != null) {
                $filename = 'file-'.$date.'.'.$this->photo->extension();
                $this->photo->storeAs('public/file', $filename);
                $vehicle_return->file = $filename;
            }
            $vehicle_return->desc = $this->desc;
            $vehicle_return->save();
            flash()->success('Pemesanan Kendaraan Berhasil diupdate.');
            return redirect('dashboard/list-pemesanan');
        } catch (Exception $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.pages.pemesanan.update-pengembalian');
    }
}
