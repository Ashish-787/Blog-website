<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
        'date',
        'dummyData'
    ];
    public function Comments(){

        return $this->hasMany(Comment::class);
    }
}
