<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;

Route::get('/', function () { return view('index'); });

Route::post("/login", [SessionController::class, "store"]);
Route::get("/login", [SessionController::class, "create"]);
