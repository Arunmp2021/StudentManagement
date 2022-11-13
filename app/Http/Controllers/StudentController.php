<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //load students list//
    public function index()
    {
        $students = Student::orderByDesc('created_at')->get();
        return view('student.index', compact('students'));
    }

    //load create page//
    public function create()                                    
    {
        $teachers = Teacher::orderByDesc('created_at')->get();
        return view('student.create', compact('teachers'));
    }

    //save student data//
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required',
            'teacher_id' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    //edit student data//
    public function edit($id)
    {
        $student = Student::find($id);
        $teachers = Teacher::orderByDesc('created_at')->get();

        return view('student.edit', compact('student', 'teachers'));
    }

    //update student data//
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required',
            'teacher_id' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    //delete student data//
    public function destroy($id)
    {
        $student = Student::find($id)->delete();
        $mark = StudentMark::where('student_id', $id)->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
}
