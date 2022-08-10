<?php

namespace App\Http\Controllers\Frontuser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use DB;
class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function Profile(){
        $vp=Invoice::where('fuser_id',auth()->user()->id)->sum('vp');
       if($vp<=59){
           $package="Basic";
       }elseif($vp>59 and $vp<=179){
           $package="Business";
       }elseif($vp>=180){
           $package="Professional";
       }else{
           $package="Not Exist";
       }
        // dd($package);
     	return view('frontend.profile.profile',compact('vp','package'));
    }
}
