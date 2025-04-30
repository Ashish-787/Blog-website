<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\models\Comment;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index(){
        $posts = Post::with('Comments')->latest()->paginate(6);
        
        return view('user.dashboard', compact('posts'));
    }



    public function ReadMore(Request $request,$id){

        $post = Post::with('comments')->findOrFail($id);
         //  dd($posts);
         return view('admin.ReadMore',compact('post'));
         
      }

    
}

