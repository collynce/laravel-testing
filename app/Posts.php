<?php

namespace App;

use App\Scopes\AuthorScope;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Posts extends Model
{
    protected $fillable = [
        'name', 'author_id', 'category_id', 'title', 'description'
    ];

//    public $category;


    public static function scopeFetchCategory($query,$value)
    {
        return $query->where('title', '=', $value)->orderBy('created_at');
    }

    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = strtolower($value);
    }

    public function getDescriptionAttribute($value)
    {
        return strtoupper($value);

    }

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope(new AuthorScope);
//    }
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
