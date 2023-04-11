<?php

use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Base\Installer\InstallController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Middleware\BackendAccess;
use App\Http\Middleware\FrontendAuth;
use App\Http\Middleware\CheckAppAndDBVersion;
use App\Http\Middleware\Installed;
use CisConfig\Facades\Config;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",function() {
    return redirect()->route("application");
});


Route::get('/Test',function() {
    return view('test');
});


Route::middleware([Installed::class,CheckAppAndDBVersion::class])->prefix('Application')->group(function() {

    /** Signin routes */
    Route::get('/Sign-In',[AuthController::class,'signIn'])->name("sign-in");
    Route::post('/Sign-In',[AuthController::class,'submitSignIn'])->name("sign-in.submit");
    Route::post('/Sign-Out',[AuthController::class,'signOut'])->name("sign-out");

    /** Frontend */
    Route::middleware([FrontendAuth::class])->group(function() {
        Route::get("/", [DashboardController::class,'index'])->name("application");

        /** Berichte */
        Route::get("/Bericht/Erstellen",[\App\Http\Controllers\Frontend\BerichtController::class,'createBericht'])->name("bericht.create-bericht");
        Route::get('/Bericht/{bericht}',[\App\Http\Controllers\Frontend\BerichtController::class,'showBericht'])->name("bericht.show-bericht");

        /** Profil */
        Route::get('/Profil',[\App\Http\Controllers\Frontend\ProfilController::class,'index'])->name("profile");
        Route::post('/Profil/Data',[\App\Http\Controllers\Frontend\ProfilController::class,'storeData'])->name("profile.data.store");
        Route::post('/Profil/Password',[\App\Http\Controllers\Frontend\ProfilController::class,'storePassword'])->name("profile.password.store");
    });

    /** Backend */
    Route::middleware([BackendAccess::class])->group(function() {
        Route::get("/Backend",[BackendHomeController::class,'index'])->name("backend");

        /** Benutzer */
        Route::get("/Backend/Users",[UserController::class,'index'])->name("backend.users");
        Route::get("/Backend/User/Create",[UserController::class,'create'])->name("backend.users.create");
        Route::post("/Backend/User/Create",[UserController::class,'store'])->name("backend.users.store");
        Route::get("/Backend/User/{user}",[UserController::class,'show'])->name("backend.users.show");
        Route::get("/Backend/User/{user}/Edit",[UserController::class,'edit'])->name("backend.users.edit");
        Route::post("/Backend/User/{user}/Edit",[UserController::class,'update'])->name("backend.users.update");

        Route::get("/Backend/GroupUser/Create",[UserController::class,'createGroupUser'])->name("backend.groupusers.create");
        Route::post("/Backend/GroupUser/Create",[UserController::class,'storeGroupUser'])->name("backend.groupusers.store");

        /** Einsatzmittel */
        Route::get('/Backend/Em',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'index'])->name("backend.em");
        Route::get('/Backend/Em/Create',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'create'])->name("backend.em.create");
        Route::post('/Backend/Em/Create',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'store'])->name("backend.em.store");
        Route::get('/Backend/Em/Edit/{einsatzmittel}',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'edit'])->name("backend.em.edit");
        Route::post('/Backend/Em/Edit/{einsatzmittel}',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'update'])->name("backend.em.update");
        Route::post('/Backend/Em/Delete/{einsatzmittel}',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'delete'])->name("backend.em.delete");
        Route::post('/Backend/Em/Order/Higher',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'orderHigher'])->name("backend.em.order.higher");
        Route::post('/Backend/Em/Order/Lower',[\App\Http\Controllers\Backend\EinsatzmittelController::class,'orderLower'])->name("backend.em.order.lower");


        /** Funktionen */
        Route::get('/Backend/Job',[\App\Http\Controllers\Backend\JobController::class,'index'])->name("backend.job");
        Route::get('/Backend/Job/Create',[\App\Http\Controllers\Backend\JobController::class,'create'])->name("backend.job.create");
        Route::post('/Backend/Job/Create',[\App\Http\Controllers\Backend\JobController::class,'store'])->name("backend.job.store");
        Route::get('/Backend/Job/Edit/{job}',[\App\Http\Controllers\Backend\JobController::class,'edit'])->name("backend.job.edit");
        Route::post('/Backend/Job/Edit/{job}',[\App\Http\Controllers\Backend\JobController::class,'update'])->name("backend.job.update");
        Route::post('/Backend/Job/Delete/{job}',[\App\Http\Controllers\Backend\JobController::class,'delete'])->name("backend.job.delete");




        /** Einstellungen */
        Route::get("/Backend/Settings",[SettingsController::class,'index'])->name("backend.settings");
        Route::post("/Backend/Settings",[SettingsController::class,'update'])->name("backend.settings.update");
    });
});



/**
 * Installer
 */
Route::prefix('Installer')->name("install.")->group(function() {
    Route::get('/',[InstallController::class,'index'])->name("index");
});
