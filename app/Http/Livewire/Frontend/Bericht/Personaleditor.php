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
        $this->einsatzmittel = Einsatzmittel::orderBy('order')->get();
        foreach($this->einsatzmittel as $em) {
            $em->mannschaft = 0;
        }
        $this->users = User::orderBy('lastname')->get();
        $this->personalUpdate();
    }

    public function render()
    {
        return view('livewire.frontend.bericht.personaleditor');
    }

    public function personalUpdate() {
        foreach($this->einsatzmittel as $em) {
            $personal = PersonalBericht::where('bericht', $this->bericht->cis_row_id)
                ->where('einsatzmittel', $em->cis_row_id)
                ->get();

            // IDs aller Führungs-Jobs
            $fuehrung_job_ids = $this->jobs->where('is_fuehrungskraft', true)->pluck('cis_row_id')->toArray();

            // Zähle Führungskräfte pro Einsatzmittel (max. 1 je Typ)
            $fuehrung_count = $personal->whereIn('job', $fuehrung_job_ids)->unique('job')->count();

            // Gesamt
            $gesamt_count = $personal->count();

            $em->fuehrung_count = $fuehrung_count;
            $em->gesamt_count = $gesamt_count - $fuehrung_count;
        }
    }
}
