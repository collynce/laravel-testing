<?php

namespace App\Listeners;

use App\Events\PostedBlog;
use App\Mail\SendMail;
use App\User;
use Illuminate\Support\Facades\Mail;

class BlogNotification
{

    public function __construct()
    {

    }

    public function handle(PostedBlog $event)
    {
        $data = $event->post;
        $users = User::where('id', '!=', auth()->id())->get();
        foreach($users as $user){
            Mail::to($user->email)->send(new SendMail($data));
        }
    }

}
