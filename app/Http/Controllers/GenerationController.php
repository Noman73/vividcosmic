<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generation;
use App\Fuser;
use Validator;
use Redirect;
// use App\Http\Trait\GenerationTrait;

class GenerationController extends Controller
{
    // use GenerationTrait;
    public function __construct(){
    	$this->middleware('auth');
    }
    public function Form(){
    	return view('pages.generation.generation');
    }
    public function Create(Request $r){
        // return $r->all();
    	$validator = Validator::make($r->all(), [
            'first' 	=> 'required|max:100|regex:/^([0-9]+)$/',
            'second' 	=> 'required|max:100|regex:/^([0-9]+)$/',
            'third' 	=> 'required|max:100|regex:/^([0-9]+)$/',
            'fourth' 	=> 'required|max:100|regex:/^([0-9]+)$/',
            'fifth' 	=> 'required|max:100|regex:/^([0-9]+)$/',
            'sixth' 	=> 'required|max:100|regex:/^([0-9]+)$/',
            'seventh' 	=> 'required|max:100|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
        	$count=Generation::all();
        	if (count($count)>0) {
        		$get_id=Generation::select('id')->where("status",1)->get();
        		$find=Generation::find($get_id[0]->id);
        		$find->status=0;
        		$find->save();
        	}
            $gen = new Generation;
            $gen->first 	= $r->first;
            $gen->second 	= $r->second;
            $gen->third 	= $r->third;
            $gen->fourth 	= $r->fourth;
            $gen->fifth 	= $r->fifth;
            $gen->sixth 	= $r->sixth;
            $gen->seventh 	= $r->seventh;
            $gen->status 	=1;
            $gen->user_id 	= auth()->user()->id;
            $gen->save();
            return redirect('/admin/generation')->with("status","Generation Submitted Success");
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    
}
