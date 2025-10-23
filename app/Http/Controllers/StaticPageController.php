<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    
    public function root(){
        return redirect()->route('home');
    }

    public function home(){ 
        return view('welcome');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contacto');
    }

}
