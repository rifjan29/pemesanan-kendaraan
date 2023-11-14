<?php

namespace App\Livewire\Forms;

use App\Models\MasterDriverModel;
use App\Models\User;
use App\Models\UsersEmployeeModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PegawaiFormPost extends Form
{
    public $id;

    #[Rule([
        'required',
    ])]
    public $name, $email,$no_telp,$jabatan;

    public $desc;


    public function save() {
        $this->validate();
        try {
            $user = new User;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make('password');
            $user->save();

            $pegawai = new UsersEmployeeModel;
            $pegawai->users_id = $user->id;
            $pegawai->no_telp = $this->no_telp;
            $pegawai->jabatan = $this->jabatan;
            $pegawai->save();
            $this->reset();
            flash()->success('Data berhasil ditambahkan');
            return redirect('dashboard/master-data/pegawai');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/pegawai');
        }
    }

    public function edit($id) {
        $pegawai = UsersEmployeeModel::find($id);
        $driver = User::find($pegawai->users_id);
        $this->id = $driver->id;
        $this->name = $driver->name;
        $this->desc = $driver->desc;
        $this->no_telp = $driver->no_telp;
    }

    public function update(){
        $driver = MasterDriverModel::find($this->id);
        $this->validate();
        try {
            $driver->name = $this->name;
            $driver->no_telp = $this->no_telp;
            $driver->desc = $this->desc;
            $driver->users_id = Auth::user()->id;
            $driver->update();
            $this->reset();
            flash()->warning('Data Berhasil Diubah.');
            return redirect('dashboard/master-data/driver');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/driver');
        }
    }
}
