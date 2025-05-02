<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Contact;
use App\models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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


      //contact page

      public function showContact(){
        return view('user.Contact');
      }


      Public function saveContact(Request $request){
           
            $user = Auth::user();

            $contact = new  Contact([
              'name'=>$request->input('name'),
              'user_id'=>$user->id,
               'phone'=>$request->input('phone'),
               'message'=>$request->input('message'),
               'email'=>$request->input('email'),

             ]);


             $contact->save();
             return response()->json([
              'status' => 'success',
              'message' => 'Thank-you for Your Contact. I will contact you shortly!!'
          ]);

      }

      public function ReadmoreUser($id){

        $post  = Post::findorFail($id);   
        return view('user.Readmore',compact('post'));
      }
    
}

