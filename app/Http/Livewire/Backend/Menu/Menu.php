<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;

class Menu extends Component
{
    public $loadingMenuItem = null;
    public $activeMenuItem = 'user';

    protected $listeners = [
        'switchedPage' => 'calledSwitchPage',
    ];

    public function mount() {
        $this->menuItems = [
            [
                'name' => 'start',
                'text' => 'Übersicht',
                'icon' => 'home',
            ],
            [
                'name' => 'user',
                'text' => 'Benutzer',
                'icon' => 'user',
            ],
            [
                'name' => 'settings',
                'text' => 'Einstellungen',
                'icon' => 'cog',
            ],
        ];
    }

    public function menuButtonClicked($menuItem) {
        $this->emit("openPage",$menuItem);
        $this->loadingMenuItem = $menuItem;
    }

    public function calledSwitchPage($pageName) {
        $this->activeMenuItem = $pageName;
        $this->loadingMenuItem = null;
    }

    public function render()
    {
        return view('livewire.backend.menu.menu');
    }
}
