<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('course')->get();
        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lesson_name' => 'required|string|max:255',
            'lesson_link' => 'required|string',
        ]);

        Lesson::create($validatedData);

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully');
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::all();
        return view('lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lesson_name' => 'required|string|max:255',
            'lesson_link' => 'required|string',
        ]);

        $lesson->update($validatedData);

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully');
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully');
    }
}
