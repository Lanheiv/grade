<?php

namespace App\Http\Controllers;

use App\Models\Grades;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grades::with(['student', 'subject'])->get();

        return view('grades', compact('grades'));
    }

    public function destroy(Grades $grade) {

        $grade->delete();
        
        return redirect("/grades");
        
    }
}
