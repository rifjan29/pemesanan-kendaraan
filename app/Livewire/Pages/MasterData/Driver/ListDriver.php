<?php

namespace App\Livewire\Pages\MasterData\Driver;

use App\Models\MasterDriverModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListDriver extends Component
{
    use WithPagination;

    #[Url]
    public $searchItem;

    public $id = '';

    public function deleteId($id) {
        $this->id = $id;
    }

    public function delete() {
        MasterDriverModel::find($this->id)->delete();
        flash()->error('Berhasil menghapus data.');
        return redirect('dashboard/master-data/driver');
    }

    public function render()
    {
        $query = MasterDriverModel::with('user')->where('name', 'like', '%'.$this->searchItem.'%');
        $driver = $query->paginate(10);
        return view('livewire.pages.master-data.driver.list-driver',[
            'data' => $driver
        ]);
    }
}
