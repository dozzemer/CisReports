<?php

namespace App\Http\Livewire\Auth;

use App\Models\InitialLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Signin extends Component
{

    public $user_key;
    public $user_password;

    protected $rules = [
        'user_key' => 'required',
        'user_password' => 'required',
    ];

    public function render()
    {
        return view('livewire.auth.signin');
    }

    public function submit() {
        $this->validate();
        if(!Auth::attempt(['email' => $this->user_key,'password' => $this->user_password])) {
            if(!Auth::attempt(['username' => $this->user_key,'password' => $this->user_password])) {
                $this->addError('auth-error', 'Benutzerschlüssel und / oder Passwort falsch.');
                return false;
            }
        }

        if(InitialLogin::where('cis_row_id_user',auth()->user()->cis_row_id)->count()) {
            $this->addError('auth-error', 'Dieses Konto ist nicht eingerichtet. Bitte verwenden Sie ihren Willkommenscode oder wenden sich an den Administrator.');
            Auth::logout();
            return false;
        }

        $user = User::where('email',$this->user_key)->orWhere('username',$this->user_key)->first();
        Auth::login($user,true);
        redirect()->route("application");
    }
}
