<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index() {
        $grades = Grades::with(['student', 'subject'])->get();

        return view('index', compact('grades'));
    }
    public function destroy(Grades $grade) {
        $grade->delete();
        
        return redirect("/");
    }
    public function create() {
        $user = User::select('id', 'first_name', 'last_name', 'admin')->get();
        $subject = Subject::get();

        return view("grade.create", compact('user', 'subject'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "student_id" => ["required", "numeric", "gt:0"],
            "subject_id" => ["required", "numeric", "gt:0"],
            "grade" => ["required", "numeric", "gt:0", "max:10"]
        ]);

        $validated['created_at'] = now();
        $validated['updated_at'] = now();

        Grades::create($validated);

        return redirect("/");
    }
}
