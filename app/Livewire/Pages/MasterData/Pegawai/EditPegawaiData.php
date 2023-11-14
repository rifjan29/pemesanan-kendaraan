<?php

namespace App\Livewire\Pages\MasterData\Pegawai;

use App\Livewire\Forms\PegawaiFormPost;
use Livewire\Component;

class EditPegawaiData extends Component
{

    public PegawaiFormPost $form;

    public function mount($id) {
        $this->form->edit($id);
    }

    public function update() {
        $this->form->update();
    }

    public function render()
    {
        return view('livewire.pages.master-data.pegawai.edit-pegawai');
    }
}
