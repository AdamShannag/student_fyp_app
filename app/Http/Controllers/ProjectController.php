<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Project;
use App\Models\Student;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('lecturers')->get();
        $students = Student::all();
        return view('project.index', compact('projects', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // we need to create a projects
        // project creating donwt need much
        // title, student, super, exam1, exam2
        $lecturers = Lecturer::all();
        $students = Student::all();
        $projects = Project::all();

        $available_students = [];
        for ($i = 0; $i < count($students); $i++) {
            $flag = true;
            for ($j = 0; $j < count($projects); $j++) {
                if ($projects[$j]->student_id === $students[$i]->id) {
                    $flag = false;
                    break;
                } else {
                    $flag = true;
                }
            }
            if ($flag === true) {
                array_push($available_students, $students[$i]);
            }
        }

        return view('project.create', compact('lecturers', 'available_students'));
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
            'title' => 'required',
            'student_id' => 'required',
            'supervisor_id' => 'required',
            'examiner_1_id' => 'required',
            'examiner_2_id' => 'required',
        ]);

        if ($request["supervisor_id"] === $request["examiner_1_id"] || $request['supervisor_id'] === $request["examiner_2_id"]) {
            return back()->withError("Please select different Supervisor, Examiner 1 and Examiner 2.")->withInput();
        }
        if ($request["examiner_1_id"] === $request["supervisor_id"] || $request['examiner_1_id'] === $request["examiner_2_id"]) {
            return back()->withError("Please select different Supervisor, Examiner 1 and Examiner 2.")->withInput();
        }
        if ($request["examiner_2_id"] === $request["supervisor_id"] || $request['examiner_2_id'] === $request["examiner_1_id"]) {
            return back()->withError("Please select different Supervisor, Examiner 1 and Examiner 2.")->withInput();
        }

        $project = new Project;
        $project->title = $request['title'];
        $project->student_id = $request['student_id'];
        $project->save();
        $project->lecturers()->attach($request->supervisor_id, ['job' => 'supervisor']);
        $project->lecturers()->attach($request->examiner_1_id, ['job' => 'examiner']);
        $project->lecturers()->attach($request->examiner_2_id, ['job' => 'examiner']);

        return redirect()->route('project.index')->with('success', 'Project has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $students = Student::all();
        $student = null;
        foreach ($students as $st) {
            if ($st->id === $project->student_id) {
                $student = $st;
                break;
            }
        }
        return view('project.show', compact('project', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projects = Project::with('lecturers')->get();
        $lecturers = Lecturer::all();
        $students = Student::all();
        $current_student = null;
        $available_students = [];
        for ($i = 0; $i < count($students); $i++) {
            $flag = false;
            for ($j = 0; $j < count($projects); $j++) {
                if ($projects[$j]->student_id === $students[$i]->id) {
                    $flag = false;
                    break;
                } else {
                    $flag = true;
                }
            }
            if ($flag === true) {
                array_push($available_students, $students[$i]);
            }
        }
        foreach ($students as $student) {
            if ($student->id === $project->student_id) {
                $current_student = $student;
                break;
            }
        }
        return view('project.edit', compact('project', 'projects', 'available_students', 'lecturers', 'current_student'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'progress' => 'required',
            'student_id' => 'required',
            'supervisor_id' => 'required',
            'examiner_1_id' => 'required',
            'examiner_2_id' => 'required',
        ]);

        if ($request["supervisor_id"] === $request["examiner_1_id"] || $request['supervisor_id'] === $request["examiner_2_id"]) {
            return back()->withError("Please select different Supervisor, Examiner 1 and Examiner 2.")->withInput();
        }
        if ($request["examiner_1_id"] === $request["supervisor_id"] || $request['examiner_1_id'] === $request["examiner_2_id"]) {
            return back()->withError("Please select different Supervisor, Examiner 1 and Examiner 2.")->withInput();
        }
        if ($request["examiner_2_id"] === $request["supervisor_id"] || $request['examiner_2_id'] === $request["examiner_1_id"]) {
            return back()->withError("Please select different Supervisor, Examiner 1 and Examiner 2.")->withInput();
        }

        $project->title = $request['title'];
        $project->start_date = $request['start_date'];
        $project->end_date = $request['end_date'];
        $project->duration = $project->getDuration($project->start_date, $project->end_date);
        $project->status = $request['status'];
        $project->progress = $request['progress'];
        $project->student_id = $request['student_id'];
        $project->lecturers()->detach();
        $project->lecturers()->attach($request->supervisor_id, ['job' => 'supervisor']);
        $project->lecturers()->attach($request->examiner_1_id, ['job' => 'examiner']);
        $project->lecturers()->attach($request->examiner_2_id, ['job' => 'examiner']);
        $project->update();

        return redirect()->route('project.index')->with('success', "Project details updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('success', "Project deleted!");
    }
}
