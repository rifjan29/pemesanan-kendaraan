<?php

namespace App\Livewire\Pages\MasterData\Pegawai;

use App\Models\MasterDriverModel;
use App\Models\User;
use App\Models\UsersEmployeeModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListPegawai extends Component
{
    use WithPagination;

    public $id = '';

    public function deleteId($id) {
        $this->id = $id;
    }

    public function delete() {
        $emp = UsersEmployeeModel::find($this->id);
        User::find($emp->users_id)->delete();
        $emp->delete();
        flash()->error('Berhasil menghapus data.');
        return redirect('dashboard/master-data/pegawai');
    }

    public function render()
    {
        // $query = UsersEmployeeModel::with('user')->where('name', 'like', '%'.$this->searchItem.'%');
        $query = UsersEmployeeModel::with('user');
        $pegawai = $query->paginate(10);
        return view('livewire.pages.master-data.pegawai.list-pegawai',[
            'data' => $pegawai
        ]);
    }
}
