<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;
Use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(Request $request){
         
        return view('Auth.login');
    }

    public function showRegister(Request $request){
        return view('Auth.Register');

    }

 

    public function Register(Request $request){

        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
        ]);


       $user = User::Create([
             'name'=>$request->name,
              'email'=>$request->email,
              'password'=>Hash::make($request->password),
              'address'=>$request->address,
              'role'=>'user',
       ]);

      Session::flash('success','Registration has Successfull');
       return redirect()->route('login');
    }


    public function login(Request $request){
         
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

       $credential = $request->only('email','password');
        if(Auth::attempt($credential)){

            $user = Auth::user();

            if($user->role =='admin'){
              return redirect()->route('admin.dashboard');
                
            }elseif($user->role =='user'){
                return redirect()->route('user.dashboard');
            }else{
                Auth::logout();
                return redirect()->with('errors','UnAuthorizes  Access');
            }

        }
        // If login fails
        return back()->with('errors','Invalid email or password');

    }


    public function logout(Request $request){
        Auth::logout();
        
        return redirect()->route('login');
    }
   
}
