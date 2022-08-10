<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Validator;
use Redirect;
use Auth;
use App\Models\Fuser;
class ChangePasswordController extends Controller
{
	public function __construct(){
		$this->middleware('auth:fuser');
	}
    public function Form(){
    	return view('frontend.password_reset.new_password');
    }
    public function Reset(Request $r){
    	// return $r->all();
        $validator = Validator::make($r->all(), [
            'old_password' => 'required|max:30|in:' . $r->old_password,
            'password' => 'required|max:30|min:8|confirmed',
        ]);
        if ($validator->passes()) {
            if (Hash::check($r->old_password, Auth::user()->password)) {
                $user = Fuser::find(Auth::user()->id);
                $user->password = Hash::make($r->password);
                $user->save();
                return redirect('/user/password_reset')->with("status","Your Profile Updated Success");
            } else {
                return redirect('/user/password_reset')->with("error","Something Wrong");
            }
        }
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
    }
}
