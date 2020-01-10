<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts as Post;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return redirect()->route('posts.index');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post-> update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');

    }
}
