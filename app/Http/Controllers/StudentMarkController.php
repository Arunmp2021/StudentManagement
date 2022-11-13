<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;

use Illuminate\Http\Request;

class StudentMarkController extends Controller
{
    
    public function index()
    {
        $studentMarks = StudentMark::orderByDesc('created_at')->get();
        return view('mark.index', compact('studentMarks'));

    }

 
    public function create()
    {
        $students = Student::orderByDesc('created_at')->get();
        return view('mark.create', compact('students'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'student_id'        => 'required|numeric',
            'term'              => 'required',
            'maths_mark'        => 'required|numeric',
            'science_mark'      => 'required|numeric',
            'history_mark'      => 'required|numeric',
           
        ]);

        StudentMark::create($request->all());

        return redirect()->route('student-mark.index')->with('success', 'Student Mark added successfully.');
    }

    public function edit($id)
    {
        $mark = StudentMark::find($id);
        $students = Student::orderByDesc('created_at')->get();

        return view('mark.edit', compact('mark', 'students'));
    }

    
    public function update(Request $request, StudentMark $StudentMark)
    {
        $request->validate([
            'student_id'        => 'required|numeric',
            'term'              => 'required',
            'maths_mark'        => 'required|numeric',
            'science_mark'      => 'required|numeric',
            'history_mark'      => 'required|numeric',
           
        ]);
        //dd($request->all());
        $StudentMark->update($request->all());

        return redirect()->route('student-mark.index')->with('success', 'Student mark updated successfully');
    }

   
    public function destroy($id)
    {
        $student = StudentMark::where('id', $id)->delete();
        return redirect()->route('student-mark.index')->with('success', 'Student mark deleted successfully');
    }
}
