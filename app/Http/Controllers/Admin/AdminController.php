<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Admin After Login
    public function admin()
    {
        $totalCourses = Course::count();
        $totalEnrollRequests = Enroll::count();
        $totalPendingEnrollRequests = Enroll::where('status', false)->count();
        $totalUsers = User::count();
        $totalTeachers = User::whereHas('roles', function ($query) {
            $query->where('name', 'Teacher');
        })->count();
        return view('admin.home', compact('totalCourses', 'totalEnrollRequests', 'totalUsers', 'totalTeachers', 'totalPendingEnrollRequests'));
    }

    //Admin Custom Logout
    public function logout()
    {
        Auth::logout();
        $notification=array('messege' => 'You are logged out!', 'alert-type' => 'success');
        return redirect()->route('login')->with($notification);
    }

    public function passwordChange()
    {
        return view('admin.profile.password_change');
    }

    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
           'old_password' => 'required',
           'password' => 'required|min:6|confirmed',
        ]);

        $current_password=Auth::user()->password;

        $oldpass=$request->old_password; 
        $new_password=$request->password;
        if (Hash::check($oldpass,$current_password)) {
               $user=User::findorfail(Auth::id());
               $user->password=Hash::make($request->password);
               $user->save(); 
               Auth::logout();
               $notification=array('messege' => 'Password Changed Successfully!', 'alert-type' => 'success');
               return redirect()->route('login')->with($notification);
        }else{
            $notification=array('messege' => 'Old Password Not Matched!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}