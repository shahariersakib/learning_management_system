<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $enrollRequests = Enroll::with('student', 'course')->get();
        return view('admin.enroll_request.enroll_request', compact('enrollRequests'));
    }

    public function accept(Request $request, $id)
    {
        $enrollRequest = Enroll::findOrFail($id);
        $enrollRequest->status = true;
        $enrollRequest->save();

        return redirect()->back()->with('success', 'Enroll request accepted');
    }

    public function reject(Request $request, $id)
    {
        $enrollRequest = Enroll::findOrFail($id);
        $enrollRequest->delete();

        return redirect()->back()->with('success', 'Enroll request rejected');
    }

    public function submitEnroll(Request $request, $course_id)
    {
        $request->validate([
            'sender_mobile_number' => 'required',
            'trx_number' => 'required',
            'amount' => 'required|numeric',
            'pay_method' => 'required',
        ]);

        Enroll::create([
            'student_id' => auth()->user()->id,
            'course_id' => $course_id,
            'sender_mobile_number' => $request->input('sender_mobile_number'),
            'trx_number' => $request->input('trx_number'),
            'amount' => $request->input('amount'),
            'pay_method' => $request->input('pay_method'),
        ]);

        return redirect()->back()->with('success', 'Enroll request submitted');
    }
}
