<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function Form(){
    	return view('frontend.profile.profile')
    }
}
