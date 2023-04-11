<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfilDataRequest;
use App\Http\Requests\StoreProfilPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index() {
        return view("frontend.profile.index");
    }

    public function storeData(StoreProfilDataRequest $request) {
        $user = auth()->user();
        $user->fill($request->only([
            'email'
        ]));
        $user->save();
        session()->flash('success','Ihre Daten wurden geändert.');
        return redirect()->route("profile");
    }

    public function storePassword(StoreProfilPasswordRequest $request) {
        $user = auth()->user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        session()->flash('success','Ihr Passwort wurden geändert.');
        return redirect()->route("profile");
    }
}
