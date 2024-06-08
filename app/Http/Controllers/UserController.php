<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;

class UserController extends Controller
{
     // Teacher/Student Related Details

     public function index()
     {
         if (auth()->user()->user_type == "admin") {
             $users = User::all();
 
             return view("admin.user", compact("users"));
         } else {
             return view('welcome');
         }
     }

     public function userDetail($id)
     {
         $user = User::findOrFail($id);        
         return view('admin.userDetails', compact("user"));
     }
 
 
     public function userUpdate(Request $request, $id)
     {

        if(!User::findOrFail($id)){
            return view("dashboard");
        }
        
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');
        $user->phone_no = $request->input('phone_no');
        $user->batch_id = $request->input('batch_id');
        $user->matric_no = $request->input('matric_no');
        $user->save();

     
         return view('admin.userDetails', compact('user'));
     }

     public function userDelete($id){
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::all();
        return view('admin.user', compact('users'));

     }
 
}
