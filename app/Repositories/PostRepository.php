<?php


namespace App\Repositories;
use App\Posts;
use Illuminate\Http\Request;

class PostRepository implements PostInterface
{
    public function get($id)
    {
        return Posts::find($id);
    }

    public function all()
    {
        return Posts::paginate(5);
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
           return Posts::create($request->all());
    }
    public function newUpdate(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $post-> update($request->all());
    }

}




