<?php

namespace App\Http\Livewire\Backend\User;

use Livewire\Component;

class Access extends Component
{

    public $user;

    public function mount($user) {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.user.access');
    }

    public function enableBackendAccess() {
        $this->user->backend_access = 1;
        $this->user->save();
    }

    public function disableBackendAccess() {
        $this->user->backend_access = 0;
        $this->user->save();
    }
}
