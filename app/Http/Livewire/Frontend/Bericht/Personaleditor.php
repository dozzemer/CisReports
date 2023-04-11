<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use App\Models\Einsatzmittel;
use App\Models\Job;
use App\Models\PersonalBericht;
use App\Models\User;
use Livewire\Component;

class Personaleditor extends Component
{
    public $bericht;
    public $jobs;

    public $einsatzmittel;

    public $users;

    public $listeners = [
        'personal-update' => 'personalUpdate',
    ];

    public function mount(Bericht $bericht) {
        $this->bericht = $bericht;
        $this->jobs = Job::orderBy('fahrzeug')->get();
        $this->einsatzmittel = Einsatzmittel::all();
        foreach($this->einsatzmittel as $em) {
            $em->mannschaft = 0;
        }
        $this->users = User::all();
        $this->personalUpdate();
    }

    public function render()
    {
        return view('livewire.frontend.bericht.personaleditor');
    }

    public function personalUpdate() {
        foreach(PersonalBericht::where('bericht',$this->bericht->cis_row_id)->get() as $bericht) {
            if($bericht->einsatzmittel) {
                $em = $this->einsatzmittel->where('cis_row_id',$bericht->einsatzmittel)->first();
                $em->mannschaft++;
            }
        }
    }
}
