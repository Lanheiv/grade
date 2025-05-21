<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function view() {
        return view("users.view");
    }
    public function create() {
        return view("users.create");
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:25', 'regex:/^[\p{L}\s]+$/u'],
            'last_name' => ['required', 'string', 'max:25', 'regex:/^[\p{L}\s]+$/u'],
            "password"=> ["required", Password::min(4)->numbers()->letters()]
        ]);

        $user = User::create($validated);

        return redirect("/");
    }
    public function edit() {
        return view("users.edit");
    }
    public function update(Request $request) {
        $user = auth()->user();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:25', 'regex:/^[\p{L}\s]+$/u'],
            'last_name' => ['required', 'string', 'max:25', 'regex:/^[\p{L}\s]+$/u'],
            "password"=> ["required", "confirmed", Password::min(4)->numbers()->letters()]
        ]);

        $user->first_name = $validate["first_name"];
        $user->last_name = $validate["last_name"];

        if (!empty($validate["password"])) {
            $user->password = $validate["password"];
        }

        $user->save();

        return redirect("/account"); 
    }

    /* Bildes sadaļa */
    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('profile_image');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('profile_pics', $filename, 'public');

        $user = auth()->user(); // or User::find($id);
        $user->profile_image = $filename;
        $user->save();

        return back()->with('success');
    }
    public function delete()
    {
        $user = auth()->user();

        if ($user->profile_image && Storage::disk('public')->exists('profile_pics/' . $user->profile_image)) {
            Storage::disk('public')->delete('profile_pics/' . $user->profile_image);
            $user->profile_image = null;
            $user->save();
        }

        return back()->with('success');
    }
}
