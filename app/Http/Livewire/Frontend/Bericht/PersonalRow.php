<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use App\Models\Einsatzmittel;
use App\Models\Job;
use App\Models\PersonalBericht;
use App\Models\User;
use Livewire\Component;

class PersonalRow extends Component
{
    public $user;
    public $bericht;
    public $einsatzmittel;
    public $jobs;
    public $personalBericht;

    public $job;

    public $defaultJob = null;

    public function mount(Bericht $bericht, User $user) {
        $this->user = $user;
        $this->bericht = $bericht;
        $this->einsatzmittel = Einsatzmittel::orderBy('order')->get();
        $this->jobs = Job::all();
        if(!$this->personalBericht = PersonalBericht::where('user',$this->user->cis_row_id)->where('bericht',$this->bericht->cis_row_id)->first()) {
            $this->personalBericht = new PersonalBericht();
            $this->personalBericht->user = $this->user->cis_row_id;
            $this->personalBericht->bericht = $this->bericht->cis_row_id;
            $this->personalBericht->save();
        }

        /* Set default Job ID */
        if($defaultJob = $this->jobs->where('fahrzeug',1)->first()) {
            $this->defaultJob = $defaultJob->cis_row_id;
        }

        if(!$this->personalBericht->job)
        {
            $defaultJob = $this->jobs->where('fahrzeug',1)->first();
            $this->job = $this->defaultJob;
            $this->personalBericht->job = $defaultJob->cis_row_id;
            $this->personalBericht->save();
        }

        $this->job = $this->personalBericht->job;
    }

    public function updatedJob()
    {
        $selectedJobObject = $this->jobs->where('cis_row_id',$this->job)->first();

        /** Wenn kein Standardjob => Prüfen auf dopplung */
        if(!$selectedJobObject->fahrzeug) {
            foreach(PersonalBericht::where('bericht',$this->bericht->cis_row_id)->get() as $row) {
                if($row->job == $selectedJobObject->cis_row_id && $row->einsatzmittel == $this->personalBericht->einsatzmittel) {
                    $this->job = $this->personalBericht->job;
                    $this->addError('dobble','Die Doppelvergabe dieser Funktion auf einem Fahrzeug ist nicht möglich.');
                    return;
                }
            }
        }
        $this->personalBericht->job = $this->job;
        $this->personalBericht->save();
    }


    public function render()
    {
        return view('livewire.frontend.bericht.personal-row');
    }

    public function setEinsatzmittel(Einsatzmittel $em) {
        if($this->personalBericht->einsatzmittel == $em->cis_row_id) {
            $this->personalBericht->einsatzmittel = null;
            $this->personalBericht->job = null;
            $this->job = $this->defaultJob;
            $this->personalBericht->save();
        }
        else {
            $this->personalBericht->einsatzmittel = $em->cis_row_id;
            $this->personalBericht->save();
        }

        $this->emit("personal-update");
    }
}
