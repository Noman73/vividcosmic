<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function Home(){
    	return view('frontend.home');
    }
}
