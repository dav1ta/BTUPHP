<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag/tags', compact('tags'));
    }

    public function create()
    {
        return view('tag/create');
    }

    public function save(SaveTagRequest  $request)
    {
        $tag = new Tag($request->all());
        $tag->save();
        return redirect()->action([TagController::class, 'index']);
    }

    public function edit(Tag $tag)
    {
        return view("tag/edit", compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect()->action([TagController::class, 'tags']);
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->action([TagController::class, 'tags']);
    }
}
