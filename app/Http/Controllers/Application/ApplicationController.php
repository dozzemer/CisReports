<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function frontend() {

    }

    public function backend() {
        return view("layout.backend");
    }
}
