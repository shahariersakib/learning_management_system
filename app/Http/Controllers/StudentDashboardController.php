<?php

use App\Http\Controllers\Controller;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $enrolledCourses = $user->enrolls;

        return view('frontend.dashboard', compact('enrolledCourses', 'user'));
    }
}