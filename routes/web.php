<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GradesController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () { 
    return Auth::check() ? view('index') : view('welcome'); // ja esi reģistrēies tad sūta uz index ja ne tad uz welcom
});

Route::get("/login", [SessionController::class, "create"])->name('login');
Route::post("/login", [SessionController::class, "store"]);

Route::get("/grades", [GradesController::class, "index"]);
Route::delete("/grades/{grade}", [GradesController::class, "destroy"]);

Route::post("/logout", [SessionController::class, "destroy"])->name('logout');



/*
    Papildus info: Pēc migrācijas tiek izveidoti divi konti kurus var izmantot lai testētu. vienam ir admin rule bet otram nav
        1. Vārds: admin
        Parole: admin1

        2. Vārds: user
        Parole: user1

    Viss tas ir arī users migrācijā.
*/

