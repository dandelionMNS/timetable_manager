<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('code', 'asc')->get();
        return view("admin.subject", compact("subjects"));
    }

    public function subjectAdd(Request $request)
    {

        $subject = new Subject();
        $subject->code = $request->input("code");
        $subject->name = $request->input("name");
        $subject->credit_hour = $request->input("credit_hour");
        $subject->save();

         $subjects = Subject::orderBy('code', 'asc')->get();
        return view("admin.subject", compact("subjects"));
    }

    public function subjectUpdate(Request $request, $id)
    {  
       $subject = Subject::findOrFail($id);
       $subject->code = $request->input("code");
       $subject->name = $request->input("name");
       $subject->credit_hour = $request->input("credit_hour");
       $subject->save();   
       
        $subjects = Subject::orderBy('code', 'asc')->get();
       return view('admin.subject', compact('subjects'));
    }

    public function subjectDelete($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();

        $subjects = Subject::orderBy('code', 'asc')->get();
        return view('admin.subject', compact('subjects'));

     }


}
