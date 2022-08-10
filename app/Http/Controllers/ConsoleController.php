<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
class ConsoleController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function StorageLink(){
    	Artisan::call("storage:link",[]);
    }
    public function RouteCache(){
    	Artisan::call("route:cache",[]);
    }
}
