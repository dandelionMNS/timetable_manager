<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('semester', 'asc')->get();
        return view("admin.course", compact("courses"));
    }

    public function courseAdd(Request $request)
    {

        $course = new Course();
        $course->code = $request->input("code");
        $course->semester = $request->input("semester");
        $course->save();

         $courses = Course::orderBy('semester', 'asc')->get();
        return view("admin.course", compact("courses"));
    }

    public function courseUpdate(Request $request, $id)
    {  
       $course = Course::findOrFail($id);
       $course->code = $request->input("code");
       $course->semester = $request->input("semester");
       $course->save();   
       
        $courses = Course::orderBy('semester', 'asc')->get();
       return view('admin.course', compact('courses'));
    }

    public function courseDelete($id){
        $course = Course::findOrFail($id);
        $course->delete();

        $courses = Course::orderBy('semester', 'asc')->get();
        return view('admin.course', compact('courses'));

     }


}
