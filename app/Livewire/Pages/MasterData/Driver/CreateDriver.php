<?php

namespace App\Livewire\Pages\MasterData\Driver;

use App\Livewire\Forms\DriverFormPost;
use App\Models\MasterDriverModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateDriver extends Component
{
    public DriverFormPost $form;

    public function store() {
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.pages.master-data.driver.create-driver');
    }
}
