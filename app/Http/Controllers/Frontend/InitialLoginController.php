<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinishInitialRequest;
use App\Http\Requests\SendInitialCodeRequest;
use App\Models\InitialLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InitialLoginController extends Controller
{
    public function index() {
        return view("frontend.initial-login.index");
    }

    public function sendCode(SendInitialCodeRequest $request) {
        $code = $request->get('code');
        if(!$initCode = InitialLogin::where('code',$code)->first()) {
            return redirect()->back()->withErrors(['code' => 'Der Willkommenscode wurde nicht gefunden.'])->withInput();
        }

        if(!$user = User::where('cis_row_id',$initCode->cis_row_id_user)->first()) {
            return redirect()->back()->withErrors(['user' => 'Benutzer nicht gefunden - Bitte kontaktieren Sie den Administrator.'])->withInput();
        }

        return redirect()->route("initial-login.set-data",$initCode->code);
    }

    public function setData($code) {

        if(!$initCode = InitialLogin::where('code',$code)->first()) {
            return redirect()->back()->withErrors(['code' => 'Der Willkommenscode wurde nicht gefunden.'])->withInput();
        }

        if(!$user = User::where('cis_row_id',$initCode->cis_row_id_user)->first()) {
            return redirect()->back()->withErrors(['user' => 'Benutzer nicht gefunden - Bitte kontaktieren Sie den Administrator.'])->withInput();
        }

        return view("frontend.initial-login.set-password")->with([
            'code' => $initCode,
            'user' => $user,
        ]);
    }

    public function finish(FinishInitialRequest $request) {
        $code = $request->get('code');
        $password = $request->get('password');
        if(!$initCode = InitialLogin::where('code',$code)->first()) {
            return redirect()->back()->withErrors(['code' => 'Der Willkommenscode wurde nicht gefunden.'])->withInput();
        }

        if(!$user = User::where('cis_row_id',$initCode->cis_row_id_user)->first()) {
            return redirect()->back()->withErrors(['user' => 'Benutzer nicht gefunden - Bitte kontaktieren Sie den Administrator.'])->withInput();
        }

        $user->password = Hash::make($password);
        $user->save();
        $initCode->delete();

        return view("frontend.initial-login.finish")->with([
            'user' => $user,
        ]);
    }
}
