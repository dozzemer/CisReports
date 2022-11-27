<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{

    public $password;
    public $password_confirmation;
    public $user;
    public $success = false;

    protected $rules = [
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ];

    public function mount(User $user) {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.user.password');
    }

    public function submit() {
        $this->success = false;
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->save();
        $this->success = true;
    }
}
