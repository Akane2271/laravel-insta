<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\softDeletes;


class Post extends Model
{
    use HasFactory,softDeletes;

    #A post belong  to a user;
    #To get the ower of the post

    public function user()
    {

        return $this->belongsTo(User::class)->withTrashed();
    }

    #to get the categories user a post

    public function categoryPost()
    {

        return $this->hasMany(categoryPost::class);
    }

    public function comments(){
    return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    #use Illuminate\Support\Facades\Auth;
    public function isliked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

}
