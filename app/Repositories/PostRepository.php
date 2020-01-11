<?php


namespace App\Repositories;
use App\Posts;

class PostRepository implements PostInterface
{
    public function get($id)
    {
        return Posts::find($id);
    }

    public function all()
    {
        return Posts::all();
    }

    public function delete($id)
    {
        Posts::destroy($id);
    }


}




