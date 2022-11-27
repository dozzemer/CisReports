<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{

    public $start = false;
    public $user;
    public $confirmation;
    public $confirmationF_input = null;
    public $error;

    public function mount(User $user) {
        $this->user = $user;
        $this->confirmation = $user->username;
    }

    public function render()
    {
        return view('livewire.backend.user.delete');
    }

    public function submit()
    {
        if($this->confirmationF_input == $this->confirmation) {
            $this->user->delete();
            session()->flash('success','Der Anwender wurde erfolgreich gelöscht.');
            return redirect()->route("backend.users");
        }
        else {
            $this->addError('confirmation', 'Der Bestätigungscode ist nicht korrekt.');
        }
    }
}
