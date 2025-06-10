<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view("auth.login");
    }
    public function postLogin(Request $request){
        $credential=$request->validate([
            "email"=>"required|email|exists:users",
            "password"=>'required'
        ]);

        if(Auth::attempt($credential)){
            return redirect()->route("dashboard");
        }else{
            return redirect()->back()->with("error_msg", "Authentication failed.");
        }

    }
    public function postRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect()->route("register")->with("success_msg", "The user account has been created.");

    }
    public function getRegister(){
        return view("auth.register");
    }
}
