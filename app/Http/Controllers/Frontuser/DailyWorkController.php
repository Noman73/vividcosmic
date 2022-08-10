<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fuser;
use App\Http\Traits\DailyWorkTrait;
use Redirect;
class DailyWorkController extends Controller
{
	use DailyWorkTrait;
     public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function AddToBalance(){
    	if($this->GetDailyWork()['current']>300){
    		$find=Fuser::find(auth()->user()->id);
	    	$find->dw_updated_at=time();
	    	$find->save();
    	}else{
            Redirect::back()->with('error','Need Minimum 300.00');
    	}
        return redirect('/user/dashboard')->with("status","Balance Added Success");
    }
    
}
