<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Team;

class AboutController extends Controller
{
    public function AboutShow(){
        $teams= Team::all();

        return view('user.about',compact('teams'));
    }
    

}
