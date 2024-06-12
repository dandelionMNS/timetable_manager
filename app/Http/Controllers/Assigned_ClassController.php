<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assigned_Class;

class Assigned_ClassController extends Controller
{
    public function index()
    {
        $assigned_classes = Assigned_Class::all();
        return view("Assigned_Class.index", compact("assigned_classes"));
    }

    public function acAdd(Request $request)
    {

        $assigned_class = new Assigned_Class();
        $assigned_class->semester = $request->input("semester");
        $assigned_class->intake = $request->input("intake");
        $assigned_class->save();

         $assigned_classes = Assigned_Class::all();
        return view("Assigned_Class.index", compact("assigned_classes"));
    }

    public function acUpdate(Request $request, $id)
    {  
       $assigned_class = Assigned_Class::findOrFail($id);
       $assigned_class->semester = $request->input("semester");
       $assigned_class->intake = $request->input("intake");
       $assigned_class->save();   
       
        $assigned_classes = Assigned_Class::all();
       return view('Assigned_Class.index', compact('assigned_classes'));
    }

    public function acDelete($id){
        $assigned_class = Assigned_Class::findOrFail($id);
        $assigned_class->delete();

        $assigned_classes = Assigned_Class::all();
        return view('Assigned_Class.index', compact('assigned_classes'));
     }
}
