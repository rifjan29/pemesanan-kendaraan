<?php

namespace App\Livewire\Pages\MasterData\Vehicle;

use App\Models\MasterDriverModel;
use App\Models\MasterVehicleModel;
use App\Models\UsersEmployeeModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListVehicle extends Component
{
    use WithPagination;

    public $id = '';

    public function deleteId($id) {
        $this->id = $id;
    }

    public function delete() {
        MasterVehicleModel::find($this->id)->delete();
        flash()->error('Berhasil menghapus data.');
        return redirect('dashboard/master-data/vehicle');
    }

    public function render()
    {
        // $query = UsersEmployeeModel::with('user')->where('name', 'like', '%'.$this->searchItem.'%');
        $vehicle = MasterVehicleModel::latest()->paginate(10);
        return view('livewire.pages.master-data.vehicle.list-vehicle',[
            'data' => $vehicle
        ]);
    }
}
