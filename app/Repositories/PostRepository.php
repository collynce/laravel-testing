<?php


namespace App\Repositories;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostRepository implements PostInterface
{
    public function get($id)
    {
        return Posts::find($id);
    }

    public function all()
    {
        return Cache::remember('posts', 10, function (){
            return Posts::paginate(5);
        });
    }

    public function delete($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
    }
    public function change($id)
    {
        return Posts::findOrFail($id);
    }

    public function newPost(Request $request)
    {
            Cache::forget('posts');
           return Posts::create($request->all());
    }
    public function newUpdate(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $post-> update($request->all());
    }

    public function fetchCategory($value)
    {
            return Posts::FetchCategory('ss')->get();

    }

}




