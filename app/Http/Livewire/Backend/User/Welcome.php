<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\InitialLogin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Welcome extends Component
{

    public $user;
    public $confirmation = false;

    public $initialLogin = null;

    protected $listeners = ['password-changed' => 'passwordChanged'];

    public function mount(User $user) {
        $this->user = $user;
        $this->initialLogin = InitialLogin::where('cis_row_id_user',$this->user->cis_row_id)->first();
    }
    public function render()
    {
        return view('livewire.backend.user.welcome');
    }

    public function setWelcome() {
        $this->initialLogin = InitialLogin::welcome($this->user);
        Mail::to($this->user->email)->send(new \App\Mail\Welcome($this->initialLogin));
        $this->confirmation = false;
    }

    public function passwordChanged() {
        InitialLogin::reset($this->user);
        $this->initialLogin = null;
    }
}
