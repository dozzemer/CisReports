<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\Bericht;
use App\Models\Einsatzmittel;
use App\Models\Job;
use Livewire\Component;

class OpenBerichts extends Component
{
    public function render()
    {
        $openBerichts = Bericht::where('is_closed',0)->get();
        if(!Job::all()->count() || !Einsatzmittel::all()->count()) {
            return view("livewire.frontend.bericht.open-berichts-no-jobs");
        }
        return view('livewire.frontend.bericht.open-berichts',[
            'openBerichts' => $openBerichts,
        ]);
    }
}
