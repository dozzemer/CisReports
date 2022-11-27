<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn() {
        if(auth()->check()) {
            return redirect()->route("application");
        }
        return view("layout.auth");
    }
}
