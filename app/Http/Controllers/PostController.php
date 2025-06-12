<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postNewPost(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,png|max:1024',
            'title'=>'required',
            'content'=>'required'
        ]);
    }
    public function getNewPost(){
        return view("admin.posts.new");
    }
}
