<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        $user = Auth::user();
        return view('posts')->with('posts',$posts)->with('user',$user);
    }

    public function show(Post $post){
    return view('post')->with('post',$post);
    }


    public function create(){
        return view('create');
    }

    public function save(SavePostRequest $request){

//        request()->validate([
//            'title'=>'required|min:5',
//            'post_text'=>'required',
//            'likes'=>'required',
//
//        ]);

        $post = new Post($request->all());
        $post -> user_id = Auth::id();
        $post->save();
        return redirect()->back();

    }

    public function delete(Request $request,Post $post){
            $post->delete();
        return $this->index();

    }

    public function update(Request $request,Post $post){
        $post ->update($request-> all());
        return view("edit")->with("post", $post);
    }


    public function edit(Request $request,Post $post){
        return view("edit")->with("post", $post);
    }

    public function my_posts(){
        $id = Auth::id();
        $user = User::find($id);
        $posts = $user->posts;
        $user = Auth::user();
        return view('posts')->with('posts',$posts)->with('user',$user);
    }

}
