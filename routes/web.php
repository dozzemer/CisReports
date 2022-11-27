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

    /** Frontend */
    Route::middleware([FrontendAuth::class])->group(function() {
        Route::get("/", [DashboardController::class,'index'])->name("application");
    });

    /** Backend */
    Route::middleware([BackendAccess::class])->group(function() {
        Route::get("/Backend",[BackendHomeController::class,'index'])->name("backend");
        Route::get("/Backend/Users",[UserController::class,'index'])->name("backend.users");
        Route::get("/Backend/User/Create",[UserController::class,'create'])->name("backend.users.create");
        Route::post("/Backend/User/Create",[UserController::class,'store'])->name("backend.users.store");
        Route::get("/Backend/User/{user}",[UserController::class,'show'])->name("backend.users.show");
        Route::get("/Backend/User/{user}/Edit",[UserController::class,'edit'])->name("backend.users.edit");
        Route::post("/Backend/User/{user}/Edit",[UserController::class,'update'])->name("backend.users.update");
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
