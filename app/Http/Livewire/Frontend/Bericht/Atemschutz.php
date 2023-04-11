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
        $this->personalBerichts = PersonalBericht::where('bericht',$bericht->cis_row_id)->with(['personal'])->where('einsatzmittel','!=',null)->get();
        $this->personalBerichts = $this->personalBerichts->sortBy(function($query) {
            return $query->personal->lastname;
        });
    }
    public function render()
    {
        return view('livewire.frontend.bericht.atemschutz');
    }
}
