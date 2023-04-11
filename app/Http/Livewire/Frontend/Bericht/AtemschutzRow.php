<?php

namespace App\Http\Livewire\Frontend\Bericht;

use App\Models\PersonalBericht;
use App\Models\User;
use Livewire\Component;

class AtemschutzRow extends Component
{

    public PersonalBericht $row;
    public User $user;
    public $pa_nr;
    public $pa_time;
    public $pa_work;

    public $writing;

    public function mount(PersonalBericht $row) {
        $this->row = $row;

        $this->pa_nr = $row->pa_nr;
        $this->pa_time = $row->pa_time;
        $this->pa_work = $row->pa_work;

        $this->user = User::find($row->user);
    }
    public function render()
    {
        return view('livewire.frontend.bericht.atemschutz-row');
    }

    public function updated() {
        $this->row->pa_nr = $this->pa_nr;
        $this->row->pa_time = $this->pa_time;
        $this->row->pa_work = $this->pa_work;
        $this->row->save();
    }
}
