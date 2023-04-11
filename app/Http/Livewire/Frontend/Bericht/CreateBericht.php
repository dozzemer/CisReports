<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use Carbon\Carbon;
use Livewire\Component;

class CreateBericht extends Component
{

    public $berichtType = null;

    public function render()
    {
        return view('livewire.frontend.bericht.create-bericht');
    }

    public function createBericht()
    {
        if($this->berichtType == null) {
            return $this->addError('type','Bitte wählen Sie eine Berichtart aus.');
        }
        $bericht = new Bericht();
        $bericht->type = $this->berichtType;
        $bericht->created_at = Carbon::now();
        $bericht->updated_at = Carbon::now();
        $bericht->created_by = auth()->user()->cis_row_id;
        $bericht->save();

        return redirect()->route("bericht.show-bericht",$bericht->cis_row_id);
    }

    public function setBerichtType($type) {
        $this->berichtType = $type;
    }
}
