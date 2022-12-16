<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = Student::all();
        if (Gate::allows('students', $students)) {
            return view('student.index', compact('students'));
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('students')) {
            return view('student.create');
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('students')) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
            ]);

            Student::create($request->all());
            return redirect()->route('student.index')->with('success', "Student created successfully!");
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        if (Gate::allows('students')) {
            return view('student.show', compact('student'));
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        if (Gate::allows('students')) {
            return view('student.edit', compact('student'));
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        if (Gate::allows('students')) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
            ]);

            $student->update($request->all());
            return redirect()->route('student.index')->with('success', "Student details updated!");
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if (Gate::allows('students')) {
            $student->delete();
            return redirect()->route('student.index')->with('success', "Student deleted!");
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }
}
