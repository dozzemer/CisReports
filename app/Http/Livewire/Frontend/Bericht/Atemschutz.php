<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use App\Models\PersonalBericht;
use Livewire\Component;

class Atemschutz extends Component
{

    public $bericht;
    public $personalBerichts;

    public function mount(Bericht $bericht) {
        $this->bericht = $bericht;
        $this->personalBerichts = PersonalBericht::where('bericht',$bericht->cis_row_id)->where('einsatzmittel','!=',null)->get();
    }
    public function render()
    {
        return view('livewire.frontend.bericht.atemschutz');
    }
}
