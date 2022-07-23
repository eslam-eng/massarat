<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('dashboard.student.index',compact('students'));
    }


    public function create()
    {
        return view('dashboard.student.create');
    }


    public function store(StudentRequest $request)
    {
        $studentData = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'faculty'=>$request->faculty,
        ];
        $student = Student::create($studentData);
        if ($student)
            return redirect()->route('students.index')->with('done','تمت العمليه بنجاح');
        return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');

    }


    public function show($id)
    {
        $students = Student::with('courseSubscription')->findOrFail($id);
        return view('dashboard.student.index',compact('students'));

    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('dashboard.student.edit',compact('student'));
    }


    public function update(StudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $studentData = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'faculty'=>$request->faculty,
        ];
        $updated = $student->update($studentData);
        if ($updated)
            return redirect()->route('students.index')->with('done','تمت العمليه بنجاح');
        return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
    }


    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $deleted =$student->delete();
        if ($deleted)
            return redirect()->route('students.index')->with('done','تمت العمليه بنجاح');
        return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');

    }
}
