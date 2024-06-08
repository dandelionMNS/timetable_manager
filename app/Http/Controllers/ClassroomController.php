<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view("admin.classroom", compact("classrooms"));
    }

    public function classroomAdd(Request $request)
    {

        $classroom = new Classroom();
        $classroom->name = $request->input("name");
        $classroom->save();
        $classrooms = Classroom::all();
        return view("admin.classroom", compact("classrooms"));
    }

    public function classroomUpdate(Request $request, $id)
    {  
       $classroom = Classroom::findOrFail($id);
       $classroom->name = $request->input('name');
       $classroom->save();   
       
       $classrooms = Classroom::all();
       return view('admin.classroom', compact('classrooms'));
    }

    public function classroomDelete($id){
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        $classrooms = Classroom::all();
        return view('admin.classroom', compact('classrooms'));

     }


}
