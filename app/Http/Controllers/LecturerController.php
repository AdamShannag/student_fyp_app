<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::with('projects')->get();
        if (Gate::allows('lecturers', $lecturers)) {
            return view('lecturer.index', compact('lecturers'));
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
        if (Gate::allows('lecturers')) {
            return view('lecturer.create');
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
        if (Gate::allows('lecturers')) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
            ]);
            Lecturer::create($request->all());
            return redirect()->route('lecturer.index')->with('success', "Lectruer created successfully!");
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        if (Gate::allows('lecturers')) {
            return view('lecturer.show', compact('lecturer'));
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        if (Gate::allows('lecturers')) {
            return view('lecturer.edit', compact('lecturer'));
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        if (Gate::allows('lecturers')) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
            ]);

            $lecturer->update($request->all());
            return redirect()->route('lecturer.index')->with('success', "Lecturer details updated!");
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        if (Gate::allows('lecturers')) {
            $user = User::where('email', $lecturer->email)->first();
            if ($user)
                $user->delete();
            $lecturer->delete();
            return redirect()->route('lecturer.index')->with('success', "Lecturer deleted!");
        } else {
            echo '<h2>Un-Authorized Access!</h2>';
        }
    }
}
