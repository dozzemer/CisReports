<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bericht;
use Illuminate\Http\Request;

class BerichtController extends Controller
{
    public function createBericht()  {
        return view("frontend.bericht.create");
    }

    public function showBericht(Bericht $bericht) {
        return view("frontend.bericht.edit",[
            'bericht' => $bericht,
        ]);
    }
}
