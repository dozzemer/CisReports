<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function signIn() {
        if(auth()->check()) {
            return redirect()->route("application");
        }
        return view("layout.auth");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signOut() {
        auth()->logout();
        return redirect()->route("application");
    }
}
