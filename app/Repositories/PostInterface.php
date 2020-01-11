<?php


namespace App\Repositories;


interface PostInterface
{
    public function get($id);

    public function all();

    public function delete($id);
}


