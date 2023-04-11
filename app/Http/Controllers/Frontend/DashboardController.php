<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bericht;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view("frontend.dashbaord.index");
    }
}
