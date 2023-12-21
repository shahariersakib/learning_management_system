<?php
    
namespace App\Http\Controllers;
    
use App\Models\Course;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Str;
    
class CourseController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:course-create', ['only' => ['create','store']]);
         $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['course_name']=$request->course_name;
        $data['course_code']=$request->course_code;
        $data['course_intro_link']=$request->course_intro_link;
        $data['course_slug']=Str::slug($request->course_name, '-');
        $data['course_desc']=$request->course_desc;
        $data['course_link']=$request->course_link;
        $data['course_price']=$request->course_price;
        $data['course_duration']=$request->course_duration;
        $data['learning_objectives']=$request->learning_objectives;
        $data['admin_id']=Auth::id();
        $data['status']=$request->status;
        DB::table('courses')->insert($data);

        $notification=array('messege' => 'New Course Created!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=DB::table('courses')->where('id',$id)->first();
        return view('courses.show',compact('course'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=DB::table('courses')->where('id',$id)->first();
        return view('courses.edit',compact('course'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        $data['course_name']=$request->course_name;
        $data['course_code']=$request->course_code;
        $data['course_intro_link']=$request->course_intro_link;
        $data['course_slug']=Str::slug($request->course_name, '-');
        $data['course_desc']=$request->course_desc;
        $data['course_link']=$request->course_link;
        $data['course_price']=$request->course_price;
        $data['course_duration']=$request->course_duration;
        $data['learning_objectives']=$request->learning_objectives;
        $data['status']=$request->status;
        DB::table('courses')->where('id',$id)->update($data);

        $notification=array('messege' => 'Course Updated!', 'alert-type' => 'success');
        return redirect()->route('courses.index')->with($notification);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('courses')->where('id',$id)->delete();

        $notification=array('messege' => 'Course Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //not status
    public function notstatus($id)
    {
        DB::table('courses')->where('id',$id)->update(['status'=>0]);
        return response()->json('Course Deactive');
    }

    //active staus
    public function activestatus($id)
    {
        DB::table('courses')->where('id',$id)->update(['status'=>1]);
        return response()->json('Course Activated');
    }
}