<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view("auth.login");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ["required"],
            "password" => ["required", Password::min(6)->numbers()->letters()]
        ]);

        if (!Auth::attempt($validated)) { // Izment kļūdu ja savienojums neizdevās
            throw ValidationException::withMessages([
                "first_name" => "Jūsu vārs ir uzrakstīts nepareizi",
                "password" => "Jūsu parole nav uzrakstīta pareizi"
            ]); 
        }

        $request->session()->regenerate();
        return redirect("/");
    }

    public function destroy() {
        Auth::logout();
        return redirect("/");
    }
}
