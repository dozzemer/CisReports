<?php

namespace App\View\Components\Backend;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Menu extends Component
{

    public $menu;
    public $activeMenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = config("menu-backend");
        $this->activeMenu = $this->getActiveItem();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.menu');
    }

    protected function getActiveItem() {
        $activeRoute = Request::route()->getName();
        $activeRouteExploded = explode(".",$activeRoute);
        if(count($activeRouteExploded) < 2) {
            $menuRoute = $activeRoute;
        }
        else {
            $menuRoute = $activeRouteExploded[0].".".$activeRouteExploded[1];
        }

        foreach($this->menu as $item) {
            if($item['route'] == $menuRoute) {
                return $item['name'];
            }
        }
    }
}
