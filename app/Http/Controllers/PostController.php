<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function getDeletePost($id){
        $p=Post::whereId($id)->firstOrFail();

        $image=$p->image;
        File::delete(public_path($image));
       // unlink($image);
        $p->delete();
        return back()->with("success_msg", "The post has been deleted.");
    }
    public function getShowPosts(){
        $posts=Post::OrderBy("id", "desc")->paginate(10);
        return view("admin.posts.show")->with(["posts"=>$posts]);
    }
    public function postNewPost(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,png|max:1024',
            'title'=>'required',
            'content'=>'required'
        ]);

        $upload_image=$request->file("image");
        $ext=$upload_image->getClientOriginalExtension();
        $image_name=date("ymdhis").".".$ext;

        $upload_image->move(public_path("images"), $image_name);

        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->image="images/".$image_name;
        $post->user_id=Auth::id();
        $post->save();
        return back()->with("success_msg", "The post has been created.");

    }
    public function getNewPost(){
        return view("admin.posts.new");
    }
}
