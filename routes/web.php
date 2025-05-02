<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;

Route::get('/',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('loginSave');


Route::get('/register',[AuthController::class,'showRegister'])->name('register');
Route::post('/register',[AuthController::class,'Register'])->name('registerStore');

Route::middleware(['auth'])->group(function(){

   Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');

   Route::get('/userReadMore/{id}',[UserController::class,'ReadmoreUser'])->name('user.ReadMore');
 
   Route::get('/Blogs',[BlogController::class,'Blogs'])->name('user.Blogs');
 

   Route::get('/contact',[UserController::class,'showContact'])->name('user.showContact');
 
   Route::get('/AboutShow',[AboutController::class,'AboutShow'])->name('user.AboutShow');

   Route::post('/saveContact',[UserController::class,'saveContact'])->name('user.saveContact');
   
   

   Route::post('logout',[AuthController::class,'logout'])->name('logout'); 
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
     Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

     Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
     Route::get('/createBlog',[AdminController::class,'Create'])->name('admin.createBlog');
     Route::post('/saveBlog',[AdminController::class,'saveBlog'])->name('admin.saveBlog');
   
     Route::get('/blogindex',[AdminController::class,'showPosts'])->name('admin.showPosts');
   
     Route::get('/showBlog',[AdminController::class,'showBlogs'])->name('admin.showBlog');

     Route::post('/post_comment/{postId}',[AdminController::class,'storeComment'])->name('admin.storeComment');
    
     Route::get('/ReadMore/{id}',[AdminController::class,'ReadMore'])->name('admin.ReadMore');

     Route::get('/add-teams',[AdminController::class,'AddTeams'])->name('admin.AddTeams');
     Route::post('/AddteamSave',[AdminController::class,'AddteamSave'])->name('admin.AddteamSave');
   
   
   
   
});

// Route::get('/', function () {
//     return view('admin.dashboard');
// });
