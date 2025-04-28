<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Container\Attributes\Auth;

use App\Http\Controllers\GradesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;

Route::get('/', function () { return Auth::check() ? view('index') : view('welcome'); });

Route::post("/create", [AccountController::class, "store"]);
Route::get("/create", [AccountController::class, "create"]);
Route::get("/account", [AccountController::class, "view"]);
Route::post("/edit", [AccountController::class, "update"]);
Route::get("/edit", [AccountController::class, "edit"]);

Route::get("/login", [SessionController::class, "create"])->name('login');
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"])->name('logout');

Route::get("/grades", [GradesController::class, "index"]);
Route::delete("/grades/{grade}", [GradesController::class, "destroy"]);

/*
    Papildus info: Pēc migrācijas tiek izveidoti divi konti kurus var izmantot lai testētu. vienam ir admin rule bet otram nav
        1. Vārds: admin
        Parole: admin1

        2. Vārds: user
        Parole: user1

    Viss tas ir arī users migrācijā.
*/

