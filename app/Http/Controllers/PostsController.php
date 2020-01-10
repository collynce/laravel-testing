<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Posts as Post;
use App\Mail\SendMail;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>'show']);
    }

    public function index()
    {
        $posts = Post::paginate(8);
        return view('admin.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        try {
            $post = Post::create($request->all());
            Mail::to($request->user())->queue(new SendMail($post));
            Log::info('Post created successfully');
        } catch (\Exception $e) {
            Log::error('An error occurred '.$e);
            return redirect()->back()->with('error', 'An error occurred, please try again.');

        }
        return redirect()->route('posts.index')->with('message', 'Post created successfully.');
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
        try{
        $post = Post::findOrFail($id);
        $post-> update($request->all());
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
        return redirect()->route('posts.index')->with('message', 'Update successful.');

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
