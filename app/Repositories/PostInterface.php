<?php


namespace App\Repositories;


use Illuminate\Http\Request;

interface PostInterface
{
    public function get($id);

    public function all();

    public function delete($id);

    public function change($id);

    public function newPost(Request $request);

    public function newUpdate(Request $request, $id);


}


