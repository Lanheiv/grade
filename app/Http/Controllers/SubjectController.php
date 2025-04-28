<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public function create() {

        return view("subject.create");
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "subject_name"=> ["required", "string", "max:25"]
        ]);

        Subject::create($validated);

        return redirect("/");
    }
}
