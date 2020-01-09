<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts as Post;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function index()
    {
        $post = DB::table('posts')->select('politics')->get();
        return view('blog', compact('post'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $posts = DB::table('posts')->where('category', 'Innovation')->first();
        return view('blog.show', compact('posts'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
