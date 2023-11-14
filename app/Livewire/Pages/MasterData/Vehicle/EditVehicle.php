<?php

namespace App\Livewire\Pages\MasterData\Vehicle;

use App\Livewire\Forms\VehicleFormPost;
use Livewire\Component;

class EditVehicle extends Component
{

    public VehicleFormPost $form;

    public function mount($id) {
        $this->form->edit($id);
    }

    public function update() {
        $this->form->update();
    }

    public function render()
    {
        return view('livewire.pages.master-data.vehicle.edit-vehicle');
    }
}
