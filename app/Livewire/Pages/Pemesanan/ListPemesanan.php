<?php

namespace App\Livewire\Pages\Pemesanan;

use App\Models\UsersEmployeeModel;
use App\Models\VehicleReservedModel;
use App\Models\VehicleReturn;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListPemesanan extends Component
{
    use WithPagination;


    public $id = '';

    public function deleteId($id) {
        $this->id = $id;
    }

    public function delete() {
        $vehicle_reserve = VehicleReservedModel::find($this->id);
        $return = VehicleReturn::where('vehicle_reserved_id',$vehicle_reserve->id)->first();
        if ($return) {
            $return->delete();
        }
        $vehicle_reserve->delete();
        flash()->error('Berhasil menghapus data.');
        return redirect('dashboard/list-pemesanan');
    }
    public function render()
    {
        $query = VehicleReservedModel::with('driver','employee','vehicle','vehicleAgre','vehicleReturn')->latest();
        if (Auth::user()->hasRole('pihak')) {
            $employee = UsersEmployeeModel::where('users_id',Auth::user()->id)->first()->id;
            $list = $query->where('vehicle_agree_id',$employee)->paginate(10);
        }else{
            $list = $query->paginate(10);
        }
        return view('livewire.pages.pemesanan.list-pemesanan',[
            'data' => $list,
        ]);
    }
}
