<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return view('posts')->with('posts',$posts);
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

}
