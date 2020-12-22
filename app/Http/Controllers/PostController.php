<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\PostUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->get();
        return view('posts', compact('posts'));
    }

    public function show(Post $post){
    return view('post')->with('post',$post);
    }


    public function create(){
        $tags = Tag::all();
        return view('create')->with('tags',$tags);
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
        $post->tags()->attach($request->tags);
        return $this->index();

    }

    public function delete(Request $request,Post $post){
            $post->delete();
        return $this->index();

    }

    public function update(Request $request,Post $post){
        $post ->update($request-> all());
        $post->user_id = Auth::id();
        $post->tags()->detach($post->tags->pluck('id'));
        $post->tags()->attach($request->tags);
        return $this->index();
    }


    public function edit(Request $request,Post $post){
        $tags = Tag::all();
        return view("edit", compact('post', 'tags'));    }

    public function my_posts(){
        $id = Auth::id();
        $user = User::find($id);
        $posts = $user->posts;
        $user = Auth::user();
        return view('posts')->with('posts',$posts)->with('user',$user);
    }

    public function approve(Post $post)
    {
        $this->authorize('approve', $post);
        $post->increment('likes',1);
        return redirect()->back();
//        dd('your post is approved');
    }

    public function is_liked(Request $request,Post $post){

        $post ->update($request-> all());
        $post->is_liked = !$post->is_liked;
        $post->save();
        $user = User::find($post->user_id);

        $details = [
            'greetings' => 'hello',
            'body' => 'post updated',
            'thanks' => 'thanks',
        ];
        $post->notify(new PostUpdated($details));

        Mail::raw("Post Updated", function ($message) use ($user,$post) {
            $message -> to($user->email)
                ->subject("post #" . $post->id . "updated");
        });
        error_log('Some message here.');

        response("ok", 200);;
    }

}
