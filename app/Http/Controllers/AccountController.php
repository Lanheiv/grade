<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    function view() {
        return view("users.view");
    }
    function create() {
        return view("users.create");
    }
    function store(Request $request) {
        $validated = $request->validate([
            "first_name"=> ["required", "string", "max:25"],
            "last_name"=> ["nullable", "string", "max:25"],
            "password"=> ["required", Password::min(4)->numbers()->letters()]
        ]);

        $user = User::create($validated);

        return redirect("/");
    }
    function edit() {
        return view("users.edit");
    }
}
