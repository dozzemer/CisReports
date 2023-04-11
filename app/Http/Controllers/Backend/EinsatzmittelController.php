<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEinsatzmittelRequest;
use App\Http\Requests\UpdateEinsatzmittelRequest;
use App\Models\Einsatzmittel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EinsatzmittelController extends Controller
{
    public function index() {
        $einsatzmittel = Einsatzmittel::orderBy('order')->get();
        return view("backend.em.index",[
            'einsatzmittel' => $einsatzmittel,
        ]);
    }

    public function orderLower(Request $request) {
        $einsatzmittel = Einsatzmittel::find($request->get("einsatzmittel"));
        if($einsatzmittel->order == 1) {
            return redirect()->back();
        }

        $lowerEM = Einsatzmittel::where('order','<',$einsatzmittel->order)->orderBy('order','DESC')->first();
        $lowerEMOrder = $lowerEM->order;

        $lowerEM->order = $einsatzmittel->order;
        $einsatzmittel->order = $lowerEMOrder;

        $lowerEM->save();
        $einsatzmittel->save();

        return redirect()->back();
    }

    public function orderHigher(Request $request) {
        $einsatzmittel = Einsatzmittel::find($request->get("einsatzmittel"));
        $lastEinsatzmittel = Einsatzmittel::orderBy('order','ASC')->first();
        if($einsatzmittel->cis_row_id == $lastEinsatzmittel->cis_row_id) {
            return redirect()->back();
        }

        $nextEinsatzmittel = Einsatzmittel::orderBy('order')->where('order','>',$einsatzmittel->order)->first();
        $nextEinsatzmittelOrder = $nextEinsatzmittel->order;

        $nextEinsatzmittel->order = $einsatzmittel->order;
        $einsatzmittel->order = $nextEinsatzmittelOrder;

        $nextEinsatzmittel->save();
        $einsatzmittel->save();

        return redirect()->back();
    }

    public function create() {
        return view("backend.em.create");
    }

    public function edit(Einsatzmittel $einsatzmittel) {
        return view("backend.em.edit",[
            'einsatzmittel' => $einsatzmittel,
        ]);
    }

    public function update(UpdateEinsatzmittelRequest $request, Einsatzmittel $einsatzmittel) {


        $em = new Einsatzmittel();
        $em->fill($request->only([
            'name',
            'fmsname',
        ]));
        $em->created_at = $einsatzmittel->created_at;
        $em->save();

        $einsatzmittel->delete();

        session()->flash('success','Einsatzmittel wurde geändert.');
        return redirect()->route("backend.em");
    }

    public function store(CreateEinsatzmittelRequest $request) {
        $em = new Einsatzmittel();
        $em->fill($request->only([
            'name',
            'fmsname',
        ]));

        if($lastEm = Einsatzmittel::orderBy('order','DESC')->first()) {
            $em->order = $lastEm->order;
            $em->order++;
        }
        else {
            $em->order = 1;
        }

        $em->save();

        session()->flash('success','Einsatzmittel wurde hinzugefügt.');
        return redirect()->route("backend.em");
    }

    public function delete(Request $request,Einsatzmittel $einsatzmittel) {

        foreach(Einsatzmittel::where('order','>',$einsatzmittel->order)->get() as $em) {
            $em->order--;
            $em->save();
        }

        if($request->get('verification') == Carbon::now()->day."-".$einsatzmittel->fmsname."-".Carbon::now()->year) {
            $einsatzmittel->delete();
        }
        else {
            return redirect()->back()->withErrors(['verification' => 'Bitte geben Sie den korrekten Schlüssel ein.'])->withInput();
        }

        session()->flash('success','Einsatzmittel wurde gelöscht..');
        return redirect()->route("backend.em");
    }
}
