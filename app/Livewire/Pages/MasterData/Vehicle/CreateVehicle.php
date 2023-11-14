<?php

namespace App\Livewire\Pages\MasterData\Vehicle;

use App\Livewire\Forms\VehicleFormPost;
use Livewire\Component;

class CreateVehicle extends Component
{
    public VehicleFormPost $form;

    public function store() {
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.pages.master-data.vehicle.create-vehicle');
    }
}
