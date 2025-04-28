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
            "last_name"=> ["required", "string", "max:25"],
            "password"=> ["required", Password::min(4)->numbers()->letters()]
        ]);

        $user = User::create($validated);

        return redirect("/");
    }
    function edit() {
        return view("users.edit");
    }
    function update(Request $request) {
        $user = auth()->user();

        $validate = $request->validate([
            "first_name"=> ["required", "string", "max:25"],
            "last_name"=> ["required", "string", "max:25"],
            "password"=> ["nullable", "confirmed", Password::min(4)->numbers()->letters()]
        ]);

        $user->first_name = $validate["first_name"];
        $user->last_name = $validate["last_name"];

        if (!empty($validate["password"])) {
            $user->password = $validate["password"];
        }

        $user->save();

        return redirect("/account"); 
    }
}
