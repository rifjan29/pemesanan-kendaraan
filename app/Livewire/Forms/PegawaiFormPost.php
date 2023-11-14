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
            $pegawai->jabatan = $this->jabatan != null ? $this->jabatan : 'pegawai';
            $pegawai->save();

            $user->assignRole('pihak');
            $this->reset();
            flash()->success('Data berhasil ditambahkan');
            return redirect('dashboard/master-data/pegawai');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/pegawai');
        }
    }

    public function edit($id) {
        $pegawai = UsersEmployeeModel::with('user')->find($id);
        $this->id = $pegawai->id;
        $this->name = $pegawai->user->name;
        $this->email = $pegawai->user->email;
        $this->jabatan = $pegawai->jabatan;
        $this->no_telp = $pegawai->no_telp;
    }

    public function update(){
        $this->validate();
        try {
            $pegawai = UsersEmployeeModel::find($this->id);
            $pegawai->no_telp = $this->no_telp;
            $pegawai->jabatan = $this->jabatan != null ? $this->jabatan : 'pegawai';
            $pegawai->update();

            $user = User::find($pegawai->users_id_id);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make('password');
            $user->update();
            $this->reset();
            flash()->warning('Data Berhasil Diubah.');
            return redirect('dashboard/master-data/pegawai');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/pegawai');
        }
    }
}
