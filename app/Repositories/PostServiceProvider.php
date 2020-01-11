<?php


namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PostInterface;
use App\Repositories\PostRepository;
class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PostInterface::class,
            PostRepository::class
        );
    }
}



