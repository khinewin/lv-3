<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function getProfile(){
        return view("admin.profile");
    }
    public function getDashboard(){
        return view("admin.dashboard");
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required', 
            'confirm_new_password'=>'required|same:new_password'
        ]);

        if(! Hash::check($request->current_password, Auth::user()->password)){
            return back()->withErrors([
             'current_password' => ['The current password is invalid.']
            ]);
        }

        $user=User::whereId(Auth::user()->id)->firstOrFail();
        $user->password=bcrypt($request->new_password);
        $user->update();
        return back()->with("success_msg", "The password has been updated.");

    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route("login")->with("success_msg", "The user account has been logout");
    }
}
