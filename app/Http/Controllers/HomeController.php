<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;
use App\Models\Servie;
use Illuminate\Support\Str; 



class HomeController extends Controller
{
    //
   
    public function index(){
        return view('index');
    }
    public function sidemenu(){
        return view('sidemenu');
    }
    public function about(){
        return view('about');
    }
    public function services(){
        $data = Servie::all();
        return view('services',compact('data'));
    }
    public function contact(){  
        return view('contact');
    }
    public function portfolio(){      
        $data = Portfolio::all();
        return view('portfolio',compact('data'));
    }
             
    public function notification(){
        return view('notification');
    }
    public function recaptcha(){
        return view('recaptcha');
    }
}