<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
class Posts extends Model
{
    protected $fillable = [
        'name', 'author_id', 'title', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
