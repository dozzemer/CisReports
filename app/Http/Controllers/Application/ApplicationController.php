<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ApplicationController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function backend(): Application|Factory|View
    {
        return view("layout.backend");
    }
}
