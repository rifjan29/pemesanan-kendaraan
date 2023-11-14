<?php

namespace App\Livewire\Pages\MasterData\Pegawai;

use App\Livewire\Forms\PegawaiFormPost;
use Livewire\Component;

class CreatePegawai extends Component
{
    public PegawaiFormPost $form;

    public function store() {
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.pages.master-data.pegawai.create-pegawai');
    }
}
