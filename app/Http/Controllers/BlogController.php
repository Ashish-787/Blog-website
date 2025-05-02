<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Contact;
use App\models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function Blogs(){
        $posts = Post::with('Comments')->latest()->paginate(6);
        
        return view('user.Blog', compact('posts'));
    }
}
