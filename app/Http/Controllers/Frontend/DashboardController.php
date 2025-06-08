<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bericht;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index() {
        return view("frontend.dashboard.index");
    }

    public function userlist() {
        $data = User::orderBy("lastname")->get()->toArray();
        $pdf = Pdf::loadView('frontend.dashboard.userlist.userlist', ['data' => $data]);
        return $pdf->download("Userlist-".Carbon::now()->format("d-m-Y-H-i-s"));
    }
}