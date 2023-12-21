<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Lesson;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // $courses=Course::where('status',1)->latest()->get();
        $data['phone'] = $request->phone;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['youtube'] = $request->youtube;
        return view('layouts.app');
    }

    public function CourseDetails($course_slug)
    {
        $courses = Course::where('course_slug',$course_slug)->first();
        $lessons = Lesson::all();

        $enrollRequest = Enroll::where('student_id', auth()->user()->id)
                                ->where('course_id', $course_slug)
                                ->first();

        $enrollmentAccepted = false;
        if ($enrollRequest && $enrollRequest->status) {
            $enrollmentAccepted = true;
        }

        return view('frontend.courses.course_details', compact('courses', 'enrollmentAccepted', 'lessons'));
    }
}
