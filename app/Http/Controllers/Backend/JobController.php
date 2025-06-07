<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequets;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::all();
        return view("backend.job.index",[
            'jobs' => $jobs,
        ]);
    }

    public function create() {
        return view("backend.job.create");
    }

    public function edit(Job $job) {
        return view("backend.job.edit",[
            'job' => $job,
        ]);
    }

    public function update(UpdateJobRequets $request, Job $job) {
        $newJob = new Job();
        $newJob->fill($request->only([
            'name',
        ]));

        // Führungskraft setzen
        $newJob->is_fuehrungskraft = $request->has('is_fuehrungskraft');

        if($request->get('fahrzeug') == 1) {
            foreach(Job::all() as $jobItem) {
                $jobItem->fahrzeug = 0;
                $jobItem->save();
            }

            $newJob->fahrzeug = 1;
        }

        $newJob->created_at = $job->created_at;
        $newJob->save();

        $job->delete();

        session()->flash('success','Funktion wurde geändert.');
        return redirect()->route("backend.job");
    }

    public function store(CreateJobRequest $request) {
        $job = new Job();
        $job->fill($request->only([
            'name',
            'fahrzeug',
        ]));

        // Führungskraft setzen
        $job->is_fuehrungskraft = $request->has('is_fuehrungskraft');

        $job->save();

        session()->flash('success','Funktion wurde hinzugefügt.');
        return redirect()->route("backend.job");
    }

    public function delete(Request $request,Job $job) {
        if($request->get('verification') == Carbon::now()->day."-".substr($job->name,0,1)."-".Carbon::now()->year) {
            $job->delete();
        }
        else {
            return redirect()->back()->withErrors(['verification' => 'Bitte geben Sie den korrekten Schlüssel ein.'])->withInput();
        }

        session()->flash('success','Funktion wurde gelöscht..');
        return redirect()->route("backend.job");
    }
}
