<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;

Route::get('/', function () { 
    return Auth::check() ? view('index') : view('welcome');
});

Route::post("/login", [SessionController::class, "store"]);
Route::get("/login", [SessionController::class, "create"]);
