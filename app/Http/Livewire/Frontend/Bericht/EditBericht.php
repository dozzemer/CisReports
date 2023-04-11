<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use Livewire\Component;

class EditBericht extends Component
{

    public $tab = 'overview';

    public $bericht;

    public function mount(Bericht $bericht) {
        $this->bericht = $bericht;
    }

    public function render()
    {
        return view('livewire.frontend.bericht.edit-bericht');
    }

    public function selectTab($tabName) {
        $this->tab = $tabName;
    }
}
