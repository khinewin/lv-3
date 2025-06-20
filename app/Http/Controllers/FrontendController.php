<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getPostsSearch(Request $r){
        $q=$r->q;
        $posts=Post::where("title", "like", "%$q%")
        ->orWhere("content", "like", "%$q%")
        ->paginate(10);
        return view("welcome")->with(["posts"=>$posts]);
    }
   public function getPostsByUser($user_id){
        $posts=Post::where("user_id", $user_id)->OrderBy("id", "desc")->paginate(10);
        return view("welcome")->with(["posts"=>$posts]);
    }
    public function getPostDetails($id){
        $p=Post::whereId($id)->firstOrFail();
        return view("post-details")->with(["p"=>$p]);
    }
    public function getWelcome(){
        $posts=Post::OrderBy("id", "desc")->paginate(10);
        return view("welcome")->with(["posts"=>$posts]);
    }
}
