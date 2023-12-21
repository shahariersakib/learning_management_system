<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Qustion;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:exam-list|exam-create|exam-edit|exam-delete', ['only' => ['index','show']]);
         $this->middleware('permission:exam-create', ['only' => ['create','store']]);
         $this->middleware('permission:exam-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:exam-delete', ['only' => ['destroy']]);

         $this->middleware('permission:qustion-list|qustion-create|qustion-edit|qustion-delete', ['only' => ['index','show']]);
         $this->middleware('permission:qustion-create', ['only' => ['create','store']]);
         $this->middleware('permission:qustion-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:qustion-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $exams = Exam::latest()->paginate(5);
        return view('frontend.exams.index',compact('exams'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('frontend.exams.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'examtitle' => 'required',
            'examcode' => 'required',
            'examdate' => 'required|date',
            'examtime' => 'required',
            'marks' => 'required|numeric',
            'totaltime' => 'required|numeric',
        ]);

        $existingExam = DB::table('exams')
        ->where('examdate', $validatedData['examdate'])
        ->where('examtime', $validatedData['examtime'])
        ->first();

        if ($existingExam) {
            $notification = ['messege' => 'An exam with the same time already exists on this day.', 'alert-type' => 'error'];
            return redirect()->back()->withInput()->with($notification);
        }

        $data = [
            'examtitle' => $validatedData['examtitle'],
            'examcode' => $validatedData['examcode'],
            'examdate' => $validatedData['examdate'],
            'examtime' => $validatedData['examtime'],
            'marks' => $validatedData['marks'],
            'totaltime' => $validatedData['totaltime'],
        ];

        DB::table('exams')->insert($data);

        $notification = ['messege' => 'New Exam Created!', 'alert-type' => 'success'];
        return redirect()->route('exams.index')->with($notification);
    }

    public function show($id)
    {
        $exams=DB::table('exams')->where('id',$id)->first();
        return view('frontend.exams.show',compact('exams'));
    }

    public function edit($id)
    {
        $exams=DB::table('exams')->where('id',$id)->first();
        return view('frontend.exams.edit',compact('exams'));
    }

    public function update(Request $request, $id)
    {
        $data=array();
        $data['examtitle']=$request->examtitle;
        $data['examcode']=$request->examcode;
        $data['examdate']=$request->examdate;
        $data['examtime']=$request->examtime;
        $data['marks']=$request->marks;
        $data['totaltime']=$request->totaltime;
        DB::table('exams')->where('id',$id)->update($data);

        $notification=array('messege' => 'Exam Updated!', 'alert-type' => 'success');
        return redirect()->route('exams.index')->with($notification);
    }

    public function destroy($id)
    {
        DB::table('exams')->where('id',$id)->delete();

        $notification=array('messege' => 'Exam Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function qusindex()
    {
        $qustions = Qustion::latest()->paginate(5);
        return view('frontend.qustion.index',compact('qustions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function quscreate()
    {
        $courses = Course::all();
        return view('frontend.qustion.create', compact('courses'));
    }

    public function qusstore(Request $request)
    {
        $data=array();
        $data['course_id']=$request->course_id;
        $data['qustion']=$request->qustion;
        $data['a']=$request->a;
        $data['b']=$request->b;
        $data['c']=$request->c;
        $data['d']=$request->d;
        $data['answer']=$request->answer;
        DB::table('qustions')->insert($data);

        $notification=array('messege' => 'New Qustion Created!', 'alert-type' => 'success');
        return redirect()->route('qustion.index')->with($notification);
    }

    public function qusshow($id)
    {
        $qustions=DB::table('qustions')->where('id',$id)->first();
        return view('frontend.qustion.show',compact('qustions'));
    }

    public function qusedit($id)
    {
        $qustions=DB::table('qustions')->where('id',$id)->first();
        return view('frontend.qustion.edit',compact('qustions'));
    }

    public function qusupdate(Request $request, $id)
    {
        $data=array();
        $data['course_id']=$request->course_id;
        $data['qustion']=$request->qustion;
        $data['a']=$request->a;
        $data['b']=$request->b;
        $data['c']=$request->c;
        $data['d']=$request->d;
        $data['answer']=$request->answer;
        DB::table('qustions')->where('id',$id)->update($data);

        $notification=array('messege' => 'Qustion Updated!', 'alert-type' => 'success');
        return redirect()->route('qustion.index')->with($notification);
    }

    public function qusdestroy($id)
    {
        DB::table('qustions')->where('id',$id)->delete();

        $notification=array('messege' => 'Qustion Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function giveExam()
    {
        $exams = Qustion::all();
        return view('quiz.index', compact('exams'));
    }
}