<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getWelcome(){
        $posts=Post::OrderBy("id", "desc")->paginate(10);
        return view("welcome")->with(["posts"=>$posts]);
    }
}
