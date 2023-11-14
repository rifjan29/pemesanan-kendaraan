<?php

namespace App\Livewire\Pages\MasterData\Driver;

use App\Livewire\Forms\DriverFormPost;
use Livewire\Component;

class EditDriver extends Component
{

    public DriverFormPost $form;

    public function mount($id) {
        $this->form->edit($id);
    }

    public function update() {
        $this->form->update();
    }

    public function render()
    {
        return view('livewire.pages.master-data.driver.edit-driver');
    }
}
