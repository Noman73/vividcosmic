<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fuser;
use App\Http\Traits\TestTrait;
use Redirect;
class GenerationController extends Controller
{
	use TestTrait;
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function AddToBalance(){
    	if($this->getCurrentBalance()['total']>=300){
    		$find=Fuser::find(auth()->user()->id);
    		$find->gen_update_at=time();
    		$find->save();
    	}else{
    		Redirect::back()->with('error','Need Minimum 300.00');
    	}
        return redirect('/user/dashboard')->with("status","Balance Added Success");

    }
    public function ShowTable(){
        $data=$this->GetGeneration();
        return view('frontend.generation.generation',compact('data'));
    }
}
