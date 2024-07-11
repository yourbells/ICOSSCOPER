<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function registration(){
        return view('registration');
    }

    public function term(){
        return view('term');
    }

    public function previous(){
        return view('previous');
    }

    public function template(){
        return view('template');
    }

    public function gallery(){
        return view('gallery');
    }
}