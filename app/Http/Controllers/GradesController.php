<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index(Request $request) 
    {
        $query = Grades::with(['student', 'subject']);

        if ($request->filled('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        $grades = $query->get();
        $students = User::select('id', 'first_name', 'last_name')->get();
        $subjects = Subject::get();

        return view('index', compact('grades', 'students', 'subjects'));
    }

    public function edit(Grades $grade) {
        $user = User::select('id', 'first_name', 'last_name', 'admin')->get();
        $subjects = Subject::get();
        
        return view('grade.edit', compact('grade', 'user', 'subjects'));
    }

    public function update(Request $request, Grades $grade){
        $validated = $request->validate([
            "student_id" => ["required", "numeric", "gt:0"],
            "subject_id" => ["required", "numeric", "gt:0"],
            "grade" => ["required", "numeric", "gt:0", "max:10"]
        ]);

        $validated['created_at'] = now();
        $validated['updated_at'] = now();

        $grade->student_id = $validated["student_id"];
        $grade->subject_id = $validated["subject_id"];
        $grade->grade = $validated["grade"];
        $grade->save();
        return redirect("/");

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
