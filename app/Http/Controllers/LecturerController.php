<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Project;
use Illuminate\Http\Request;

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
        return view('lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        Lecturer::create($request->all());
        return redirect()->route('lecturer.index')->with('success',"Lectruer created successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        return view('lecturer.show', compact('lecturer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturer.edit', compact('lecturer'));

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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $lecturer->update($request->all());
        return redirect()->route('lecturer.index')->with('success',"Lecturer details updated!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturer.index')->with('success',"Lecturer deleted!");

    }
}
