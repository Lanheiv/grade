<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\GradesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SubjectController;


Route::get('/', function () {
    if (Auth::check()) {
        return app(GradesController::class)->index(request());
    } else {
        return view('welcome');
    }
});
Route::middleware(['admin_check'])->group(function () {
    Route::get('/grade', [GradesController::class, "create"]);
    Route::post('/grade', [GradesController::class, "store"]);
    Route::get('/grade/{grade}/edit', [GradesController::class, 'edit']);
    Route::put('/grade/{grade}', [GradesController::class, 'update']); 
    Route::delete('/{grade}', [GradesController::class, "destroy"]);

    Route::post("/create", [AccountController::class, "store"]);
    Route::get("/create", [AccountController::class, "create"]);

    Route::post("/subject", [SubjectController::class, "store"]);
    Route::get("/subject", [SubjectController::class, "create"]);


});
Route::middleware(['login_check'])->group(function () {
    Route::get("/account", [AccountController::class, "view"]);
    Route::post("/edit", [AccountController::class, "update"]);
    Route::get("/edit", [AccountController::class, "edit"]);

    Route::post('/delete-profile-image', [AccountController::class, 'delete'])->name('profile.image.delete');
    Route::post('/upload-profile', [AccountController::class, 'upload'])->name('profile.upload');
});

Route::get("/login", [SessionController::class, "create"])->name('login');
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"])->name('logout');

/*
    Papildus info: Pēc migrācijas tiek izveidoti divi konti kurus var izmantot lai testētu. vienam ir admin rule bet otram nav
        1. Vārds: admin
        Parole: admin1

        2. Vārds: user
        Parole: user1
*/

