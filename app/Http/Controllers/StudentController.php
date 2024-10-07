<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index', ['students' => Student::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = DB::table('classes')->get();
        return view('students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'parent_phone' => 'required',
            'class_id' => 'required',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Them thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = Classes::all();
        return view('students.edit', [
            'classes' => $classes,
            'student' => $student
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // dd($request->all());
        // $id = $request->input('id');
        // $StudentEmail = $request->input('StudentEmail');
        // $StudentGender = $request->input('StudentGender');
        // $ClassRoomID = $request->input('ClassRoomID');

        $validateData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'parent_phone' => 'required',
            'class_id' => 'required',
        ]);

        // $student->update([
        //     'id' => $id,
        //     'StudentEmail' => $StudentEmail,
        //     'StudentGender' => $StudentGender,
        //     'ClassRoomID' => $ClassRoomID
        // ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xoa thanh cong');
    }
}
