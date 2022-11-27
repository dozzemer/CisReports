<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Main extends Component
{
    public $activePage = 'user';
    public $error = null;
    public $pageLocked = false;

    protected $listeners = [
        'openPage' => 'calledOpenPage',
        'lock-page' => 'lockPage',
        'unlock-page' => 'unlockPage',
    ];

    public function render()
    {
        return view('livewire.backend.main');
    }

    public function calledOpenPage($pageName) {
        $this->activePage = $pageName;
        $this->emit('switchedPage',$pageName);
    }

    public function lockPage() {
        $this->pageLocked = true;
    }

    public function unlockPage() {
        $this->pageLocked = false;
    }
}
