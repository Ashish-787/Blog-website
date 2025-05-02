<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\models\Comment;
use App\models\Team;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }




    public function Create(){
        return view('admin.CreateBlog');
    }


    public function saveBlog(Request $request){
           
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagepath = null;

        if($request->hasFile('image')){
           $imagepath = $request->file('image')->store('image','public');
        }

        $slug   =  Str::slug($request->title, '-');

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'image' => $imagepath,
            'date'=>$request->date,
        ]);


        return response()->json([
            'status'=>'success',
            'message'=>'post Creating Successfully',
            'post'=>$post
        ]);
       

    }

   public function storeComment(Request $request,$postId){
                
        $request->validate([
            'content'=>'required',
            'author_name'=>'nullable|string|max:255'
        ]);

        $post = Post::findOrFail($postId);
         
        $comment = new  Comment([
            'content'=>$request->input('content'),
            'author_name'=>$request->input('author_name','Gust by Default'),
        ]);

        $post->Comments()->save($comment);

        return back()->with('success','Comment added successfully!');

   }


    public function showPosts(){

       $posts =Post::all();

    //    dd($posts);
       return view('admin.BlogIndex',compact('posts'));

    }


    public function showBlogs(){

        $posts =Post::all();
 
     //    dd($posts);
        return view('admin.BlogIndex',compact('posts'));
 
     }


     //Read More On BlogIndex page


     public function ReadMore(Request $request,$id){

       $post = Post::with('comments')->findOrFail($id);
        //  dd($posts);
        return view('admin.ReadMore',compact('post'));
        
     }


     //Team Members Add
     public function AddTeams(){
        return view('admin.teamsadd');
     }


     public function AddteamSave(Request $request)
     {
        
     
         $request->validate([
             'name' => 'required|max:220',
             'image' => 'required',
             'designation' => 'required'
         ]);
     
         $imagepath = null;
     
         if ($request->hasFile('image')) {
             $imagepath = $request->file('image')->store('image', 'public');
         }
     
           // Get authenticated user
    $user = Auth::user();
     
         $teams = new Team([
             'name' => $request->input('name'),
             'user_id' => $user->id, 
             'image_text' => $request->input('image_text'),
             'designation' => $request->input('designation'),
             'image' => $imagepath,
         ]);
       //  dd(Auth::user());
         $teams->save();
     
         return response()->json(['status' => 'success', 'message' => 'Team saved successfully']);
     }
     
}
