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
 
     public function updateUser(ProfileUpdateRequest $request): RedirectResponse
     {
         $request->user()->fill($request->validated());
 
         if ($request->user()->isDirty('email')) {
             $request->user()->email_verified_at = null;
         }
 
         $request->user()->save();
 
         return Redirect::route('profile.edit')->with('status', 'profile-updated');
     }
 
}
