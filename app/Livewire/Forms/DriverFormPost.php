<?php

namespace App\Livewire\Forms;

use App\Models\MasterDriverModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class DriverFormPost extends Form
{
    public $id;

    #[Rule([
        'required',
    ])]
    public $name, $no_telp;

    public $desc;


    public function save() {
        $this->validate();
        try {
            $driver = new MasterDriverModel;
            $driver->name = $this->name;
            $driver->no_telp = $this->no_telp;
            $driver->desc = $this->desc;
            $driver->users_id = Auth::user()->id;
            $driver->save();
            $this->reset();
            flash()->success('Data berhasil ditambahkan');
            return redirect('dashboard/master-data/driver');
        } catch (Exception $e) {
            flash()->error('Terjadi Kesalahan.');
            return redirect('dashboard/master-data/driver');
        }
    }

    public function edit($id) {
        $driver = MasterDriverModel::find($id);
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
