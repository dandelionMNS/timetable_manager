<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Assigned_Class;
use App\Models\Course;
use App\Models\Day;

class Assigned_ClassController extends Controller
{
    public function index($c_id)
    {
        $assigned_classes = Assigned_Class::with(['subject','instructor','location','day'])->where('course_id', $c_id)->get();
        $course = Course::findOrFail($c_id);        
        return view("Assigned_Class.index", compact("assigned_classes","course"));
    }

    public function acAddPage($c_id, )
    {
        $course = Course::findOrFail($c_id);
        $subjects = Subject::orderBy('code')->get();
        $instructors = User::where("user_type",'teacher')->orderBy("matric_no")->get();
        $locations = Classroom::orderBy("name")->get();
        $days = Day::all();
        return view('Assigned_Class.add', compact('course', 'subjects', 'instructors','locations','days'));
    }

    public function acAdd(Request $request, $c_id)
    {

        $course = Course::findOrFail($c_id);

        $assigned_class = new Assigned_Class();
        $assigned_class->subject_id = $request->input("subject_id");
        $assigned_class->instructor_id = $request->input("instructor_id");
        $assigned_class->course_id = $request->input("course_id");
        $assigned_class->location_id = $request->input("location_id");
        $assigned_class->day_id = $request->input("day_id");
        $assigned_class->time_start = $request->input("time_start");
        $assigned_class->time_end = $request->input("time_end");
        $assigned_class->save();      

        $assigned_classes = Assigned_Class::orderBy('day_id')->get();
        return view("Assigned_Class.index", ['assigned_classes'=>$assigned_classes, "course"=>$course]);
    }

    public function acUpdate(Request $request, $id, $c_id)
    {
        $course = Course::findOrFail($c_id);

        $assigned_class = Assigned_Class::findOrFail($id);
        $assigned_class->subject_id = $request->input("subject_id");
        $assigned_class->instructor_id = $request->input("instructor_id");
        $assigned_class->course_id = $request->input("course_id");
        $assigned_class->location_id = $request->input("location_id");
        $assigned_class->day_id = $request->input("day_id");
        $assigned_class->time_start = $request->input("time_start");
        $assigned_class->time_end = $request->input("time_end");
        $assigned_class->save();  

        $assigned_classes = Assigned_Class::with(['subject','instructor','location','day'])->where('course_id', $c_id)->get();
        $course = Course::findOrFail($c_id);        
        return view("Assigned_Class.index", ['assigned_classes'=>$assigned_classes, "course"=>$course]);
    }

    public function acDelete($id, $c_id)
    {
        $assigned_class = Assigned_Class::findOrFail($id);
        $assigned_class->delete();

        $assigned_classes = Assigned_Class::with(['subject','instructor','location','day'])->where('course_id', $c_id)->get();
        $course = Course::findOrFail($c_id);        
        return view('admin.batch');
    }

}
