<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Course;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function index()
    {
        $routines = Routine::all();
        return view('routine.index', compact('routines'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('routine.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Routine::create($request->all());

        return redirect()->route('routines.index')->with('success', 'Routine added successfully.');
    }

    public function edit($id)
    {
        $routine = Routine::findOrFail($id);
        return view('routine.edit', compact('routine'));
    }

    public function update(Request $request, $id)
    {
        $routine = Routine::findOrFail($id);

        $request->validate([
            // Define validation rules for your inputs
            'course_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $routine->course_id = $request->course_id;
        $routine->day = $request->day;
        $routine->start_time = $request->start_time;
        $routine->end_time = $request->end_time;

        $routine->save();

        return redirect()->route('routines.index')->with('success', 'Routine updated successfully.');
    }

    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();

        return redirect()->route('routines.index')->with('success', 'Routine deleted successfully.');
    }
}