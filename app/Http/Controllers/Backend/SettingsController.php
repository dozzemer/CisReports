<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateSettingsRequest;
use CisConfig\Facades\Config;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        return view("backend.settings.index");
    }

    public function update(UpdateSettingsRequest $request) {
        foreach($request->only([
            'organisation_name',
            'user_auth_method',
        ]) as $key => $value)
        {
            Config::set($key,$value);
        }

        session()->flash('success','Die Änderungen wurden gespeichert.');
        return redirect()->route("backend.settings");
    }
}
