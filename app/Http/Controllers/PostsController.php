<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

use App\Posts as Post;
use App\Mail\SendMail;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Repositories\PostInterface;

class PostsController extends Controller
{
    protected $post;
    public function __construct(PostInterface $post)
    {
        $this->middleware('auth', ['except'=>'show']);
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();
        return view('admin.index', compact('posts'));
    }


    public function create(Request $request)
    {
        $category = Category::get()->pluck('category', 'id')->prepend('Select...', '');
        return view('admin.create', compact('category'));
    }

    public function store(Request $request)
    {
        try {
            $user = User::where('id', '!=', auth()->id())->pluck('email', 'id');
            $post = $this->post->newPost($request);
            Mail::to($user)->queue(new SendMail($post));
            Log::info('Post created successfully');
        } catch (\Exception $e) {
            Log::error('An error occurred '.$e);
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
        return redirect()->route('posts.index')->with('message', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = $this->post->get($id);
        return view('admin.show', compact('post'));
    }


    public function edit($id)
    {
        $post = $this->post->change($id);
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        try{
        $this->post->newUpdate($request, $id);
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
        return redirect()->route('posts.index')->with('message', 'Update successful.');
    }

    public function destroy($id)
    {
        $this->post->delete($id);
        return redirect()->route('posts.index');
    }

    public function fetchCategory()
    {
        $category =  Post::FetchCategory('ss')->get();

        return view('welcome', compact('category'));
    }

}
