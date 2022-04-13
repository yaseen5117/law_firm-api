<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function comments()
    {
        return $this->hasMany(Comment::class,)->latest()->take(3);
    }
    public function favourite_posts()
    {
        return $this->hasMany(FavouritePost::class,);
    } 
    public function getReactionsCount()
    {
        return $this->favourite_posts()->count();
    }
}
