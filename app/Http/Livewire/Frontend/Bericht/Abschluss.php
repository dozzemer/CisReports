<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Mail\Einsatzbericht;
use App\Models\Bericht;
use App\Models\BerichtText;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Abschluss extends Component
{
    public $bericht;

    public $confirmClose = false;

    public $berichtCheck = false;

    public function mount(Bericht $bericht)
    {
        $this->bericht = $bericht;
        if(BerichtText::where('cis_row_id_bericht',$bericht->cis_row_id)->count()){
            $this->berichtCheck = true;
        }
    }

    public function render()
    {
        return view('livewire.frontend.bericht.abschluss');
    }

    public function closeBericht() {
        Mail::to(auth()->user()->email)->send(new Einsatzbericht($this->bericht));
        Mail::to(config("einsatzbericht.einsatzbericht_mail"))->send(new Einsatzbericht($this->bericht));

        $this->bericht->closed_at = Carbon::now();
        $this->bericht->closed_by = auth()->user()->cis_row_id;
        $this->bericht->is_closed = 1;

        $this->bericht->save();

        session()->flash('Der Bericht wurde abgeschlossen.');

        return redirect()->route("application");
    }

}
